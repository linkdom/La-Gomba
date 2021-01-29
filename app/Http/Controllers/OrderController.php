<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\PayerInfo;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Transaction;

class OrderController extends Controller
{

    public function index(){
        return view('mushroom-detail');
    }

    public function checkout(){
        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if ($cart->stockAmount > $cart->totalQty){
            Session::forget('cart');
        }

        return view('checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function create(Request $request){

        if (empty($request->get("zip_code")) || empty($request->get("city")) || empty($request->get("street")) || empty($request->get("phone"))) {
            abort(404);
        }

        if (!Session::has('cart')) {
            abort(404);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if ($cart->stockAmount > $cart->totalQty){
            Session::forget('cart');
        }

        $shippingAddress = new ShippingAddress();
        $shippingAddress->setCity($request->get('city'))
            ->setPostalCode($request->get('zip_code'))
            ->setLine1($request->get('street'));


        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $itemList = new ItemList();

        foreach ($cart->items as $product) {

            $item = new Item();
            $item->setName($product["item"]["title"])
                ->setCurrency('EUR')
                ->setQuantity($product["qty"])
                ->setPrice($product["price"] / $product["qty"]);

            $itemList->addItem($item);
        }

        $details = new Details();

        $amount = new Amount();
        $amount->setCurrency("EUR")
            ->setTotal($cart->totalPrice)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://lagomba.com/execute-payment")
            ->setCancelUrl("http://lagomba.com/cancel-payment");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AbL9VKFooIswflxO3FY7iZ1n2KtdzQ_w22f96V2DGdtYCtkS6oFTMi_jYqdIjdLfeRhMHBC6rdiEr_vL',     // ClientID
                'EIX5g8EZbLx_tIGGw0sMatTLoScmYTktYTjTQJk6yat4p59qtHLXZoI5WDDq7Ic8maOlcIlyYDnlj9uT'      // ClientSecret
            )
        );

        $payment->create($apiContext);

        Order::create([
            'order_id' => uniqid(),
            'user_id' => Auth::id(),
            'items' => serialize($cart->items),
            'total' => $cart->totalPrice,
            'shipping_city' => $request->get('city'),
            'shipping_postcode' => $request->get('zip_code'),
            'shipping_street' => $request->get('street'),
            'customer_phone' => $request->get('phone'),
        ]);

        return redirect($payment->getApprovalLink());

    }

    public function execute(){

        $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();

        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if ($cart->stockAmount > $cart->totalQty){
            Session::forget('cart');
        }

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AbL9VKFooIswflxO3FY7iZ1n2KtdzQ_w22f96V2DGdtYCtkS6oFTMi_jYqdIjdLfeRhMHBC6rdiEr_vL',     // ClientID
                'EIX5g8EZbLx_tIGGw0sMatTLoScmYTktYTjTQJk6yat4p59qtHLXZoI5WDDq7Ic8maOlcIlyYDnlj9uT'      // ClientSecret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $amount->setCurrency('EUR');
        $amount->setTotal($cart->totalPrice);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        $result = $payment->execute($execution, $apiContext);

        $items = $cart->items;

        foreach ($items as $item) {
            $productId = $item['item']['id'];
            $stock = Stock::where('product_id', $productId)->first();
            $stock->amount = $stock->amount - $item['qty'];
            $stock->save();
        }

        Session::forget('cart');

        $transaction = $result->getTransactions();
        $relatedResources = $transaction[0]->getRelatedResources();
        $sale = $relatedResources[0]->getSale();
        $id = $sale->getId();

        $order->order_id = $id;
        $order->save();


        return view('dashboard')->with(['message' => 'Order successful.']);

    }
}

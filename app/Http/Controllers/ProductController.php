<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\HarvestingPeriod;
use App\Models\HeaderText;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $harvestingPeriods = HarvestingPeriod::all()->sortBy('from');
        $products = Product::all();
        $today = date("Y-m-d");

        return view('products')->with(['harvestingPeriods' => $harvestingPeriods, 'products' => $products, 'today' => $today]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function detail(Request $request)
    {
        $product = Product::find($request->id);
        $harvestingPeriod = $product->harvestingPeriod;
        $stockAmount = null;
        $headerText = HeaderText::where('slug', 'product-details')->first();

        if (!empty($product->stockAmount)) {
            $stockAmount = $product->stockAmount->amount;
        }

        return view('mushroom-detail')->with(['product' => $product, 'harvestingPeriod' => $harvestingPeriod,  'stockAmount' => $stockAmount, 'text' => $headerText]);
    }


    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($request->get('quantity'),$product, $product->id, $product->stockAmount->amount);

        $request->session()->put('cart', $cart);
        return redirect()->back();

    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0 ){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function getAddOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addOne($id);

        Session::put('cart', $cart);

        return redirect()->back();
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0 ){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function getCart() {
        if (!Session::has('cart')) {
            $headerText = HeaderText::where('slug', 'shopping-cart')->first();
            return view('shopping-cart')->with('text', $headerText);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if ($cart->stockAmount > $cart->totalQty){
            Session::forget('cart');
        }

        return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

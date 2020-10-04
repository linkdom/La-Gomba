<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class AdminStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->user()->currentTeam->name == "Admin") {
            $products = Product::all();
            $stocks = Stock::all();

            return view('admin.stocks.index')->with(['stocks' => $stocks, 'products' => $products]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        if ($request->user()->currentTeam->name == "Admin") {
            $products = Product::all();

            return view('admin.stocks.create')->with('products',$products);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $this ->validate($request, [
                'product' => 'required',
                'amount' => 'required'
            ]);

            $stocks = Stock::all();

            foreach ($stocks as $stock) {
                if ($stock->product_id == $request->get('product')) {
                    return redirect()->back()->withErrors(['error' => 'There is already a stock entry for this product. Please edit or delete the existing one.']);
                }
            }

            Stock::create([
                'product_id' => $request->get('product'),
                'amount' => $request->get('amount')
            ]);

            $products = Product::all();

            return view('admin.stocks.index')->with(['stocks' => $stocks, 'products' => $products, 'message' => 'Stock successfully added']);
        } else {
            abort(404);
        }
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
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $stock = Stock::find($id);
            $product = Product::find($stock->product_id);

            return view('admin.stocks.edit')->with(['stock' => $stock, 'product' => $product]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $this ->validate($request, [
                'amount' => 'required'
            ]);

            $stocks = Stock::all();

            foreach ($stocks as $stock) {
                if ($stock->product_id == $request->get('product')) {
                    return redirect()->back()->withErrors(['error' => 'There is already a stock entry for this product. Please edit or delete the existing one.']);
                }
            }

            $stock = Stock::find($id);
            $stock->amount = $request->get('amount');
            $stock->save();

            $products = Product::all();

            return view('admin.stocks.index')->with(['stocks' => $stocks, 'products' => $products, 'message' => 'Stock successfully edited']);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $stock = Stock::find($id);
            $stock->delete();

            $stocks = Stock::all();
            $products = Product::all();

            return view('admin.stocks.index')->with(['stocks' => $stocks, 'products' => $products, 'message' => 'Stock successfully deleted']);
        } else {
            abort(404);
        }
    }
}

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
            $products = Product::all();
            $stocks = Stock::all();

            return view('admin.stocks.index')->with(['stocks' => $stocks, 'products' => $products, 'message' => 'Stock added successfully']);
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

<?php

namespace App\Http\Controllers;

use App\Models\HarvestingPeriod;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $harvestingPeriods = HarvestingPeriod::all();
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

        if (!empty($product->stockAmount)) {
            $stockAmount = $product->stockAmount->amount;
        }

        return view('mushroom-detail')->with(['product' => $product, 'harvestingPeriod' => $harvestingPeriod,  'stockAmount' => $stockAmount]);
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

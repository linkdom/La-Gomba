<?php

namespace App\Http\Controllers;

use App\Models\HarvestingPeriod;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminHarvestingPeriodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $harvestingPeriods = HarvestingPeriod::all()->sortBy('from');

            return view('admin.harvestingPeriods.index')->with('harvestingPeriods', $harvestingPeriods);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $products = Product::all();

            return view('admin.harvestingPeriods.create')->with('products', $products);
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
                'from' => 'required',
                'to' => 'required'
            ]);

            if ($request->get('from') > $request->get('to')) {
                return redirect()->back()->withErrors(['from' => 'Start date must be smaller than end date']);
            }

            HarvestingPeriod::create([
                'product_id' => $request->get('product'),
                'from' => $request->get('from'),
                'to' => $request->get('to')
            ]);

            $harvestingPeriods = HarvestingPeriod::all()->sortBy('from');

            return view('admin.harvestingPeriods.index')->with(['harvestingPeriods' => $harvestingPeriods, 'message' => 'Harvesting period created successfully.']);
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
     * @param Request $request
     * @param int $id
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $harvestingPeriod = HarvestingPeriod::find($id);
            $products = Product::all();

            return view('admin.harvestingPeriods.edit')->with(['harvestingPeriod' => $harvestingPeriod, 'products' => $products]);
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
                'product' => 'required',
                'from' => 'required',
                'to' => 'required'
            ]);

            if ($request->get('from') > $request->get('to')) {
                return redirect()->back()->withErrors(['from' => 'Start date must be smaller than end date']);
            }

            $harvestingPeriod = HarvestingPeriod::find($id);
            $harvestingPeriod->product_id = $request->get('product');
            $harvestingPeriod->from = $request->get('from');
            $harvestingPeriod->to = $request->get('to');
            $harvestingPeriod->save();

            $harvestingPeriods = HarvestingPeriod::all()->sortBy('from');

            return view('admin.harvestingPeriods.index')->with(['harvestingPeriods' => $harvestingPeriods, 'message' => 'Harvesting period successfully created']);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $harvestingPeriod = HarvestingPeriod::find($id);
            $harvestingPeriod->delete();

            $harvestingPeriods = HarvestingPeriod::all()->sortBy('from');

            return view('admin.harvestingPeriods.index')->with(['harvestingPeriods' => $harvestingPeriods, 'message' => 'Harvesting period successfully deleted.']);
        } else {
            abort(404);
        }
    }
}

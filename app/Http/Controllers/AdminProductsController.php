<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
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

            return view('admin.products.index')->with('products', $products);
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

            return view('admin.products.create');
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
                'title' => 'required',
                'subtitle' => 'required',
                'description' => 'required',
                'price' => 'required',
                'image' => 'required'
            ]);

            //Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

            Product::create([
                'title' => $request->get('title'),
                'subtitle' => $request->get('subtitle'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'image' => '/storage/images/' . $fileNameToStore
            ]);

            $products = Product::all();

            return view('admin.products.index')->with(['products' => $products, 'message' => 'Product created successfully.']);
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

            $product = Product::find($id);

            return view('admin.products.edit')->with('product', $product);
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
                'title' => 'required',
                'subtitle' => 'required',
                'description' => 'required'
            ]);

            $product = Product::find($id);
            $product->title = $request->get('title');
            $product->subtitle = $request->get('subtitle');
            $product->description = $request->get('description');
            $product->price = $request->get('price');

            if ($request->file('image') != null) {

                //Get filename with extension
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

                $product->image = '/storage/images/' . $fileNameToStore;
            }

            $product->save();

            $products = Product::all();

            return view('admin.products.index')->with(['products' => $products, 'message' => 'Product edited successfully.']);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $product = Product::find($id);
            $product->delete();

            $products = Product::all();

            return view('admin.products.index')->with(['products' => $products, 'message' => 'Product successfully deleted.']);
        } else {
            abort(404);
        }

    }
}

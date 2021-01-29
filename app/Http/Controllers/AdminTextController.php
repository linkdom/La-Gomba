<?php

namespace App\Http\Controllers;

use App\Models\HeaderText;
use Illuminate\Http\Request;

class AdminTextController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->user()->currentTeam->name == "Admin") {
            $texts = HeaderText::all();

            return view('admin.texts.index')->with('texts', $texts);
        } else {
            abort(404);
        }
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

            $text = HeaderText::find($id);

            return view('admin.texts.edit')->with('text', $text);
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
            ]);

            $text = HeaderText::find($id);
            $text->title = $request->get('title');
            $text->subtitle = $request->get('subtitle');

            if (empty($request->get('status'))){
                $text->status = 0;
            } else {
                $text->status = 1;
            }

            $text->save();

            $texts = HeaderText::all();

            return view('admin.texts.index')->with(['texts' => $texts, 'message' => 'Header Text successfully edited.']);
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

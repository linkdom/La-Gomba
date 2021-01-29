<?php

namespace App\Http\Controllers;

use App\Models\HeaderText;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $headerText = HeaderText::where('slug', 'about')->first();

        return view('blog')->with('text', $headerText);
    }
}

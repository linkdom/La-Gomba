<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function dropzoneStore(Blog $blog, Request $request){

        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $blogPost = new AdminBlogController();
        $blogPost->addImage($blog, ["url" => "/img/" . $imageName]);
        $image->move(public_path('img'), $imageName);
    }
}

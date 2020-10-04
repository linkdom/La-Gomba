<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->user()->currentTeam->name == "Admin") {

            $posts = Blog::all();

            return view('admin.blog.index')->with('posts', $posts);
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

            return view('admin.blog.create');
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

            Blog::create([
                'title' => $request->get('title'),
                'subtitle' => $request->get('subtitle'),
                'paragraph' => $request->get('description'),
                'image' => '/storage/images/' . $fileNameToStore
            ]);

            $posts = Blog::all();

            return view('admin.blog.index')->with(['posts' => $posts, 'message' => 'Post successfully created.']);

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

            $post = Blog::find($id);

            return view('admin.blog.edit')->with('post', $post);
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
                'description' => 'required',
            ]);

            $post = Blog::find($id);
            $post->title = $request->get('title');
            $post->subtitle = $request->get('subtitle');
            $post->paragraph = $request->get('description');

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

                $post->image = '/storage/images/' . $fileNameToStore;
            }

            $post->save();

            $posts = Blog::all();

            return view('admin.blog.index')->with(['posts' => $posts, 'message' => 'Post successfully edited.']);
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

            $post = Blog::find($id);
            $post->delete();

            $posts = Blog::all();

            return view('admin.blog.index')->with(['posts' => $posts, 'message' => 'Post successfully deleted.']);
        } else {
            abort(404);
        }
    }
}

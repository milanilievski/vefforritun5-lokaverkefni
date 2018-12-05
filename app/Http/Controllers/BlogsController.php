<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        if ($user->exists) {
            $blogs = Blog::latest()->where('user_id', $user->id)->get();
        } else {
            $blogs = Blog::latest()->get();
        }


        return view("blogs/index", compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blogs/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $blog = Blog::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'image_path' => request()->file('image')->store('img', 'public')
        ]);

        return redirect($blog->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view("blogs/show", compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        if (auth()->id() != $blog->user_id) {
            return back();
        }


        return view('blogs/edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if (auth()->id() != $blog->user_id) {
            return back();
        }

        request()->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        
        $blog->update(request()->all());

        return redirect($blog->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        /*$blog->comments()->delete();*/
        $blog->delete();

        return redirect('/blogs');
    }
}

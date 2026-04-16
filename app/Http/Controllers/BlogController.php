<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        // save blog to db
        Auth::user()->blogs()->create([
            'title' => request('title'),
            'description' => request('description'),
        ]);

        // redirect to blog list
        return redirect(route('blogs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
          return view('blogs.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id !== Auth::id()){
            abort(403); 
        }
            
        return view('blogs.edit', ['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        if ($blog->user_id !== Auth::id()){
            abort(403); 
        }

        $blog->update([
            'title' => request('title'),
            'description' => request('description'),
        ]);
        return redirect(route('blogs'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id !== Auth::id()){
            abort(403); 
        }
        $blog->delete();
        return redirect(route('blogs'));
    }
}

<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        // validate inputs
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:10', 'max:255'],
            'description' => ['required', 'min:10']
        ]);
        // save blog to db
        Auth::user()->blogs()->create($validated);

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
    public function update(Request $request, Blog $blog)
    {
        if ($blog->user_id !== Auth::id()){
            abort(403); 
        }

        // validate inputs
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:10', 'max:255'],
            'description' => ['required', 'min:10']
        ]);
        $blog->update($validated);
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

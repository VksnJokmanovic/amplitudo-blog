<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginateBlogs= Post::query()->paginate(8);
        return view('posts.index', ['posts' => $paginateBlogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::query()->create([
                'title' => $request->title,
                'summary'=>$request->summary,
                'content'=>$request->content,
                'user_id'=>$request->user_id=Auth::id()
            ]

        );

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($post_id)
    {
        $post= Post::query()->find($post_id);
       return view('posts.show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

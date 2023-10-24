<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePostRequest;

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
    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Post::query()->where('id', $post->id)->update($request->validated());
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Request $request)
    {
        $redirectPage = $this->calculateRedirectPage($request->perPage,$request->total,$request->currentPage );
        $post->delete();
        return redirect()->route('post.index', ['page' => $redirectPage]);
    }

    public function calculateRedirectPage($perPage, $total, $currentPage){
       if ($total<$perPage)
           return 1;

       $numberOfElements = $total - ($currentPage-1)*$perPage;
       if($numberOfElements ==1)
           return $currentPage-1;

       return $currentPage;




    }
}

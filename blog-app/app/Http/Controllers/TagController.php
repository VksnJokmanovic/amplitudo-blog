<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginateBlogs= Tag::query()->paginate(8);
        return view('tags.index', ['tags' => $paginateBlogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $validatedData = $request->validated();


        $tag = new Tag([
            'title' => $validatedData['title'],
            'summary' => $validatedData['summary'],
            'content' => $validatedData['content'],
        ]);
        $tag->save();

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($tag_id)
    {
        $tag= Tag::query()->find($tag_id);
        return view('tags.show', ['tag'=> $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', ['tag'=>$tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        Tag::query()->where('id', $tag->id)->update($request->validated());
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag, Request $request)
    {
        $redirectPage = $this->calculateRedirectPage($request->perPage,$request->total,$request->currentPage );
        $tag->delete();
        return redirect()->route('tag.index', ['page' => $redirectPage]);
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

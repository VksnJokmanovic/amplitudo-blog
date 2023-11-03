<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $paginateBlogs= Category::query()->paginate(8);
        return view('categories.index', ['categories' => $paginateBlogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();


        $category = new Category([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($category_id)
    {
        $category= Category::query()->find($category_id);
        return view('categories.show', ['category'=> $category]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Category::query()->where('id', $category->id)->update($request->validated());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,Request $request)
    {
        $redirectPage = $this->calculateRedirectPage($request->perPage,$request->total,$request->currentPage );
        $category->delete();
        return redirect()->route('category.index', ['page' => $redirectPage]);
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

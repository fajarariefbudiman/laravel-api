<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryDetailResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::all();
        // return response()->json(Category::all());
        return CategoryResource::collection($category);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique',
            'slug' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return response()->json(["data" => $category]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
       $category = Category::find($id);
        //return response()->json($category);
        return new CategoryDetailResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return response()->json(null,204);
    }
}

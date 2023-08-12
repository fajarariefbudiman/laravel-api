<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product = Product::all();
        // return response()->json(Product::all());
        return ProductResource::collection($product);
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
            'name' => 'required',
            'slug' => 'required|unique',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        $product->save();

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
       $product = Product::with('category:id,name,slug')->find($id);
        //return response()->json($product);
        return new ProductDetailResource($product);
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        $product->save();

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        if ($product) {
            # code...
            $product->delete();
        } else {
            # code...
        }
        
        return response()->json(null,204);

    }
}

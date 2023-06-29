<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'required',
        ]);

        $product = new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->discount_percent=$request->discount_percent;
        $product->sale_price=$request->sale_price;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        uploadImage($request,$product,'image');

       $product->save();
       return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'category_id' => 'required',
        ]);
        $product = Product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->discount_percent=$request->discount_percent;
        $product->sale_price=$request->sale_price;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        uploadImage($request,$product,'image');

       $product->update();
       return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

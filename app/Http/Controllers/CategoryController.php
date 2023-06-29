<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $categories = Category::all();  //normal
       //with pagination
       $categories = Category::paginate(3);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'required|max:1024',
        ]);

        $category = new Category();
        $category -> name = $request->name;
        $category->slug=Str::slug($request->name);
        $category -> description = $request->description;
        // if ($request->hasFile('image')){
        //     $file = $request->image;
        //     $newName = time() . "." . $file->getClientOriginalExtension();
        //     $file->move("images",$newName);
        //     $category->image = "images/$newName";
        // }
        uploadImage($request,$category,'image');
        $category->save();
        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($id);
        $category -> name = $request->name;
        $category->slug=Str::slug($request->name);
        $category -> description = $request->description;
        // if ($request->hasFile('image')){
        //     $file = $request->image;
        //     $newName = time() . "." . $file->getClientOriginalExtension();
        //     $file->move("images",$newName);
        //     $category->image = "images/$newName";
        // }
        uploadImage($request,$category,'image');
        $category->update();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        $file=public_path($category->image);
        if(file_exists($file)){
            unlink($file);
        }
        $category->delete();
        return redirect()->back();
    }
}

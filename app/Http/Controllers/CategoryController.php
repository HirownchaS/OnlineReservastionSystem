<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("category.index",compact("categories"));
    }
    public function create(){
        return view("category.create");
    }
    public function store(Request $request){
        
       // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Store the image
    $image = $request->file('image')->store('public/categories');

    // Create the category
    Category::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $image
    ]);

    // Redirect back with success message
    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
}

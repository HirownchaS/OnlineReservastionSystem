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
    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);
    
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image')->store('public/categories');
            
            // Delete the old image from storage
            if ($category->image) {
                Storage::delete($category->image);
            }
    
            // Update the category with the new image
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image
            ]);
        } else {
            // Update the category without changing the image
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
{
    
    $category = Category::findOrFail($id);

    // Detach all menus associated with this category
    $category->menus()->detach();

    // Delete the category from the database
    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
}

}

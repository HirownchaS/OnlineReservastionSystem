<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use Storage;
class MenuController extends Controller
{
   public function index(){
    $menus = Menu::all();
    return view("menus.index",compact("menus"));
   }
   public function create()
    {
        $categories = Category::all();
        return view('menus.create', compact('categories'));
    }
    public function store(Request $request){
       
           // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required|numeric', // Validate price as numeric
        'categories' => 'nullable|array', // Optional: Validate categories as an array
        'categories.*' => 'exists:categories,id', // Ensure each category exists in the database
    ]);
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }
    public function show($id){

    }
    public function edit($id){
        $menus = Menu::findOrFail($id);
        $categories = Category::all();
        return view('menus.edit',compact('categories','menus'));
    }
    public function update(Request $request, Menu $menu)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'categories' => 'required|array', // Validate categories
        'categories.*' => 'exists:categories,id', // Ensure each category ID exists
    ]);

    // Handle image upload if a new image is provided
    $image = $menu->image; // Keep the current image if no new image is uploaded
    if ($request->hasFile('image')) {
        Storage::delete($menu->image); // Delete the old image
        $image = $request->file('image')->store('public/menus'); // Store the new image
    }

    // Update the menu with the new data
    $menu->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $image,
        'price' => $request->price,
    ]);

    // Update the categories associated with this menu
    if ($request->has('categories')) {
        $menu->categories()->sync($request->categories);
    }

    // Redirect back to the menus index with a success message
    return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
}

}

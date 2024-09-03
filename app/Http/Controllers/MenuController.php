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
    public function update(Request $request, $id)
    {
        // Find the menu by ID
        $menu = Menu::findOrFail($id);
    
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image')->store('public/menus');
            
            // Delete the old image from storage
            if ($menu->image) {
                Storage::delete($menu->image);
            }
    
            // Update the menu with the new image
            $menu->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
                'price' => $request->price,
            ]);
        } else {
            // Update the menu without changing the image
            $menu->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        }
    
        // Update the categories associated with the menu
        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }
    
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }
    public function destroy($id)
{

    $menu = Menu::findOrFail($id);

    // Delete the image from storage
    if ($menu->image) {
        Storage::delete($menu->image);
    }

    // Detach all categories associated with the menu
    $menu->categories()->detach();

    // Delete the menu from the database
    $menu->delete();
    return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
}
    

}

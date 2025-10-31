<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Make sure to use your Menu Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // To handle file deletion

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all menus for the index view
        $menus = Menu::all();
        return view('admin.addmenu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Shows the form for creating a new menu item
        return view('admin.addmenu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the request data
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|lte:price', // Discount can't be more than price
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // 2. Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('menu_images'), $imageName); // Store image in public/menu_images
            $imagePath = 'menu_images/' . $imageName;
        }

        // 3. Create the new Menu item
        Menu::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount ?? 0, // Use 0 if discount is not provided
            'image' => $imagePath,
        ]);

        // 4. Redirect with success message
        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the menu item and show its details
        $menu = Menu::findOrFail($id);
        return view('admin.addmenu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the menu item to populate the edit form
        $menu = Menu::findOrFail($id);
        return view('admin.addmenu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the menu item
        $menu = Menu::findOrFail($id);

        // 1. Validate the request data
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|lte:price',
            // Allow image to be nullable or a valid image file
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Handle image upload/replacement
        $imagePath = $menu->image; // Keep old image path by default

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($menu->image && File::exists(public_path($menu->image))) {
                File::delete(public_path($menu->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('menu_images'), $imageName);
            $imagePath = 'menu_images/' . $imageName;
        }

        // 3. Update the Menu item
        $menu->update([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'image' => $imagePath,
        ]);

        // 4. Redirect with success message
        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the menu item
        $menu = Menu::findOrFail($id);

        // 1. Delete the image file from storage if it exists
        if ($menu->image && File::exists(public_path($menu->image))) {
            File::delete(public_path($menu->image));
        }

        // 2. Delete the record from the database
        $menu->delete();

        // 3. Redirect with success message
        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu item deleted successfully.');
    }
}
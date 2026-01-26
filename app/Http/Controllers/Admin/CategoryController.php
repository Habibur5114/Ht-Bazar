<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('Admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.category.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',

        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/category'), $imageName);
            $imagePath = 'uploads/category/'.$imageName;
        }

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (! $category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return view('Admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($category->image && File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/category'), $imageName);

            $category->image = 'uploads/category/'.$imageName;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;

        $category->save();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category updated successfully!');
    }

   public function delete($id)
{
    $category = Category::findOrFail($id);
    if ($category->subcategories()->exists()) {
        return redirect()
            ->route('admin.category.index')
            ->with('error', 'Cannot delete category because it has subcategories!');
    }
    if ($category->image && File::exists(public_path($category->image))) {
        File::delete(public_path($category->image));
    }
    $category->delete();

    return redirect()
        ->route('admin.category.index')
        ->with('success', 'Category deleted successfully!');
}

}

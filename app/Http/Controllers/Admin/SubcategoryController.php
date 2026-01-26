<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();

        return view('Admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('Admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/subcategory'), $imageName);
            $imagePath = 'uploads/subcategory/'.$imageName;
        }

        $subcategory = Subcategory::create([

            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory created successfully!');
    }

    public function edit($id)
    {
        $subcategorys = Subcategory::findOrFail($id);
        $categories = Category::where('status', 1)->get();

        return view('Admin.subcategory.edit', compact('subcategorys', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $subcategory = Subcategory::findOrFail($id);

        $imagePath = $subcategory->image;

        if ($request->hasFile('image')) {

            if ($subcategory->image && file_exists(public_path($subcategory->image))) {
                unlink(public_path($subcategory->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/subcategory'), $imageName);
            $imagePath = 'uploads/subcategory/'.$imageName;
        }

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.subcategory.index')
            ->with('success', 'Subcategory updated successfully!');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        if ($subcategory->childcategories()->exists()) {
            return redirect()
                ->route('admin.subcategory.index')
                ->with('error', 'Cannot delete subcategory because it has child categories!');
        }
        $subcategory->delete();

        return redirect()
            ->route('admin.subcategory.index')
            ->with('success', 'Subcategory deleted successfully!');
    }
}

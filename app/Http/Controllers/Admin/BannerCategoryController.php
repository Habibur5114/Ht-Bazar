<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerCategory;
use Illuminate\Support\Str;

class BannerCategoryController extends Controller
{

    public function index()
    {
        $categories = BannerCategory::all();
        return view('Admin.banner.banner_category.index', compact('categories'));
    }


    public function create()
    {
        return view('Admin.banner.banner_category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:banner_categories,name',
            'status' => 'required|boolean',
        ]);

        BannerCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.banner-category.index')->with('success', 'Banner Category created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $category = BannerCategory::findOrFail($id);
        return view('Admin.banner.banner_category.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, $id)
    {
        $category = BannerCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:banner_categories,name,' . $category->id,
            'status' => 'required|boolean',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.banner-category.index')->with('success', 'Banner Category updated successfully!');
    }

    // Delete category
    public function delete($id)
    {
        $category = BannerCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.banner-category.index')->with('success', 'Banner Category deleted successfully!');
    }
}


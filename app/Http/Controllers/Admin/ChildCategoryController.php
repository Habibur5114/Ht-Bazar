<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{

    public function index()
    {
        $childCategories = ChildCategory::with('subcategory')->latest()->get();
        return view('admin.ChildCategory.index', compact('childCategories'));
    }

    public function create()
    {
        $subcategories = Subcategory::where('status', 1)->get();
        return view('admin.ChildCategory.create', compact('subcategories'));
    }



    
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'name'           => 'required|string|max:100',
            'description'    => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'         => 'required|boolean',
        ]);

        $data = $request->only([
            'subcategory_id',
            'name',
            'description',
            'status'
        ]);
        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/child_categories'), $imageName);
            $data['image'] = $imageName;
        }

        ChildCategory::create($data);

        return redirect()->route('admin.childcategory.index')
            ->with('success', 'Child Category created successfully');
    }


    public function edit($id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        $subcategories = Subcategory::where('status', 1)->get();

        return view('admin.ChildCategory.edit', compact('childCategory', 'subcategories'));
    }


    public function update(Request $request, $id)
    {
        $childCategory = ChildCategory::findOrFail($id);

        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'name'           => 'required|string|max:100',
            'description'    => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'         => 'required|boolean',
        ]);

        $data = $request->only([
            'subcategory_id',
            'name',
            'description',
            'status'
        ]);
        if ($childCategory->name !== $request->name) {
            $data['slug'] = Str::slug($request->name);
        }
        if ($request->hasFile('image')) {
            if ($childCategory->image && file_exists(public_path('uploads/child_categories/'.$childCategory->image))) {
                unlink(public_path('uploads/child_categories/'.$childCategory->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/child_categories'), $imageName);
            $data['image'] = $imageName;
        }

        $childCategory->update($data);

        return redirect()->route('admin.childcategory.index')
            ->with('success', 'Child Category updated successfully');
    }

    /** 🔹 Delete */
    public function delete($id)
    {
        $childCategory = ChildCategory::findOrFail($id);

        if ($childCategory->image && file_exists(public_path('uploads/child_categories/'.$childCategory->image))) {
            unlink(public_path('uploads/child_categories/'.$childCategory->image));
        }

        $childCategory->delete();

        return redirect()->back()->with('success', 'Child Category deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;


class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    // Show create form
    public function create()
    {
        return view('admin.brand.create');
    }

    // Store new brand
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:brands,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name', 'status');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/brands'), $imageName);
            $data['image'] = $imageName;
        }

        Brand::create($data);

        return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    // Update brand
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:brands,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name', 'status');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($brand->image && file_exists(public_path('uploads/brands/'.$brand->image))) {
                unlink(public_path('uploads/brands/'.$brand->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/brands'), $imageName);
            $data['image'] = $imageName;
        }

        $brand->update($data);

        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully!');
    }

    // Delete brand
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);

        // Delete image if exists
        if ($brand->image && file_exists(public_path('uploads/brands/'.$brand->image))) {
            unlink(public_path('uploads/brands/'.$brand->image));
        }

        $brand->delete();

        return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully!');
    }
}

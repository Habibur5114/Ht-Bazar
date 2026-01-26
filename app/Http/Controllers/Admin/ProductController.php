<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('Admin.product.index', compact('products'));
    }

    public function create()
    {
        $data['categories'] = Category::select('id', 'name')->get();
        $data['subcategories'] = Subcategory::select('id', 'name')->get();
        $data['ChildCategorys'] = ChildCategory::select('id', 'name')->get();
        $data['brands'] = Brand::select('id', 'name')->get();
        $data['sizes'] = Size::select('id', 'name')->get();
        $data['colors'] = color::select('id', 'name')->get();

        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'childcategory_id' => 'nullable|exists:child_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'purchase_price' => 'required|numeric',
            'new_price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /* ===== Image Upload ===== */
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $name);
                $images[] = $name;
            }
        }

        $product = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'brand_id' => $request->brand_id,
            'purchase_price' => $request->purchase_price,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'stock' => $request->stock ?? 0,
            'image' => $images,
            'product_unit' => $request->product_unit,
            'product_video' => $request->product_video,
            'size' => $request->size,
            'color' => $request->color,
            'description' => $request->description,
            'status' => $request->status ?? 1,
            'feature_product' => $request->feature_product ?? 0,
            'best_selling' => $request->best_selling ?? 0,
            'offer' => $request->offer ?? 0,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully!');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $data['categories'] = Category::select('id', 'name')->get();
        $data['subcategories'] = Subcategory::select('id', 'name')->get();
        $data['ChildCategorys'] = ChildCategory::select('id', 'name')->get();
        $data['brands'] = Brand::select('id', 'name')->get();
        $data['sizes'] = Size::select('id', 'name')->get();
        $data['colors'] = color::select('id', 'name')->get();

        return view('Admin.product.edit', $data, compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'purchase_price' => 'required|numeric',
            'new_price' => 'required|numeric',
            'images' => 'nullable|array',
            'size' => 'nullable|array',
            'color' => 'nullable|array',
        ]);

        $images = is_array($product->image) ? $product->image : [];

        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $removeImage) {
                $path = public_path('uploads/products/'.$removeImage);
                if (file_exists($path)) {
                    unlink($path);
                }
                $images = array_diff($images, [$removeImage]);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $name);
                $images[] = $name;
            }
        }

        $product->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'brand_id' => $request->brand_id,
            'purchase_price' => $request->purchase_price,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'stock' => $request->stock ?? 0,
            'image' => array_values($images),
            'product_unit' => $request->product_unit,
            'product_video' => $request->product_video,
            'size' => $request->size,
            'color' => $request->color,
            'description' => $request->description,
            'status' => $request->status ?? 1,
            'feature_product' => $request->feature_product ?? 0,
            'best_selling' => $request->best_selling ?? 0,
            'offer' => $request->offer ?? 0,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            foreach ($product->image as $image) {
                if (file_exists(public_path('uploads/products/'.$image))) {
                    unlink(public_path('uploads/products/'.$image));
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully!');
    }
}

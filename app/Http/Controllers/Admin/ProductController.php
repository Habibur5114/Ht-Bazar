<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Brand;

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
        return view('admin.product.create', $data);
    }
}

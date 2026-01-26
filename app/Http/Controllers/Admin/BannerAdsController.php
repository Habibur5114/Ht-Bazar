<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerAds;
use App\Models\BannerCategory;
use Illuminate\Http\Request;

class BannerAdsController extends Controller
{
    public function index()
    {
        $banners = BannerAds::latest()->get();

        return view('Admin.banner.banner_ads.index', compact('banners'));
    }

    public function create()
    {
        $categories = BannerCategory::get();

        return view('Admin.banner.banner_ads.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:150',
            'offer' => 'nullable|string|max:150',
            'link' => 'nullable|url',
            'banner_category' => 'required|string|max:150',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name', 'offer', 'link', 'banner_category', 'status');

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/banners'), $imageName);
            $data['image'] = $imageName;
        }

        BannerAds::create($data);

        return redirect()->route('admin.banner-ads.index')->with('success', 'Banner created successfully!');
    }

    public function edit($id)
    {
        $banner = BannerAds::findOrFail($id);
        $categories = BannerCategory::where('status', 1)->get();

        return view('Admin.banner.banner_ads.edit', compact('banner', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $banner = BannerAds::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:150',
            'offer' => 'nullable|string|max:150',
            'link' => 'nullable|url',
            'banner_category' => 'required|string|max:150',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name', 'offer', 'link', 'banner_category', 'status');

        if ($request->hasFile('image')) {
            if ($banner->image && file_exists(public_path('uploads/banners/'.$banner->image))) {
                unlink(public_path('uploads/banners/'.$banner->image));
            }

            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/banners'), $imageName);
            $data['image'] = $imageName;
        }

        $banner->update($data);

        return redirect()->route('admin.banner-ads.index')->with('success', 'Banner updated successfully!');
    }

    public function delete($id)
    {
        $banner = BannerAds::findOrFail($id);

        if ($banner->image && file_exists(public_path('uploads/banners/'.$banner->image))) {
            unlink(public_path('uploads/banners/'.$banner->image));
        }

        $banner->delete();

        return redirect()->route('admin.banner-ads.index')->with('success', 'Banner deleted successfully!');
    }
}

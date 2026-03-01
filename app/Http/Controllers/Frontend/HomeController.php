<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{BannerAds, Category, Product, Slider};

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['banner_ads'] = BannerAds::where('status', 1)->latest()->take(2)->get();
        $data['categories'] = Category::where('status', 1)->get();
        $data['products'] = Product::where('feature_product', 1)->get();

        return view('Frontend.index', $data);
    }
}

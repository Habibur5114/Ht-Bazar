<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerAds extends Model
{

    protected $table = 'banners_ads';


      protected $fillable = [
        'name',
        'offer',
        'link',
        'banner_category',
        'image',
        'status',
    ];

     public function bannercategory()
    {
        return $this->belongsTo(BannerCategory::class, 'banner_category');
    }
}

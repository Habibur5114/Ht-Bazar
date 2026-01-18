<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
   protected $fillable = [
        'name',
        'slug',
        'status',
    ];

     public function banners()
    {
        return $this->hasMany(BannerAds ::class);
    }
}

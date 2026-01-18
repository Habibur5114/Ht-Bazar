<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

     public static function boot()
    {
        parent::boot();

        static::saving(function ($brand) {
            $brand->slug = Str::slug($brand->name);
        });
    }
}

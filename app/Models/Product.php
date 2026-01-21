<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'brand_id',
        'purchase_price',
        'old_price',
        'new_price',
        'stock',
        'image',
        'product_unit',
        'product_video',
        'size',
        'color',
        'description',
        'status',
        'feature_product',
        'best_selling',
        'offer',
    ];
}

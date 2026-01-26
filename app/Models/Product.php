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

    protected $casts = [
        'image' => 'array',
        'size'  => 'array',
        'color' => 'array',
        'status' => 'boolean',
        'feature_product' => 'boolean',
        'best_selling' => 'boolean',
        'offer' => 'boolean',
    ];

    /* ================= Relationships ================= */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function childcategory()
    {
        return $this->belongsTo(ChildCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function size()
{
    return $this->belongsToMany(Size::class);
}
}

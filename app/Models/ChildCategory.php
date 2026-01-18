<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $fillable = [
        'subcategory_id',
        'name',
        'slug',
        'description',
        'image',
        'status'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product', 'description', 'price', 'available', 'category_id', 'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

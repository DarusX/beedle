<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product', 'description', 'price', 'available', 'visible', 'category_id', 'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
    public function deal()
    {
        return $this->hasMany(Deal::class);
    }
}

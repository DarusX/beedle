<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'color_id', 'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function getTotalAttribute()
    {
        return $this->quantity * $this->product->price;
    }
}

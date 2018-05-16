<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $fillable = [
        'product_id', 'color_id', 'order_id', 'quantity', 'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'deal', 'code', 'quantity', 'expiration', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

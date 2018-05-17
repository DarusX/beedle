<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Banner extends Model
{
    protected $fillable = [
        'expiration', 'banner', 'page'
    ];

    public function scopeActive($query)
    {
        return $query->where('expiration', '>', Carbon::now());
    }
}

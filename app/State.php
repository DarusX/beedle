<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state'
    ];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'conekta_id', 'paypal_id', 'status', 'municipality_id', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function getEstadoAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Pendiente';
            break;
            case 1:
                return 'Pagado';
            break;
        }
    }
}

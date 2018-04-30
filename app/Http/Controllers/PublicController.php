<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class PublicController extends Controller
{
    public function brand($brand)
    {
        return view('brand')->with([
            'brand' => Brand::with(['products' => function($q){
                $q->with(['photos' => function($r){
                    $r->first();
                }]);
            }])->where('brand', $brand)->first()
        ]);
    }
}

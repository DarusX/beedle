<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class PublicController extends Controller
{
    public function brand($brand)
    {
        return view('brand')->with([
            'brand' => Brand::where('brand', $brand)->first()
        ]);
    }
}

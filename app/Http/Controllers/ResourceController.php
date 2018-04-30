<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;

class ResourceController extends Controller
{
    public function categories()
    {
        return Category::select('category')->get();
    }
    public function brands()
    {
        return Brand::select('brand')->get();
    }
}

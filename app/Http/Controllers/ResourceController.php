<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\State;
use App\Municipality;

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
    public function states()
    {
        return State::all();
    }
    public function municipalities($id)
    {
        return State::with('municipalities')->find($id);
    }
}

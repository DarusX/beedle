<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Product;
use App\Banner;

class PublicController extends Controller
{
    public function index()
    {
        return view('index')->with([
            'products' => Product::doesntHave('deal')->inRandomOrder()->limit(12)->get(),
            'banners' => Banner::active()->get()
        ]);
    }
    public function brand($brand)
    {
        return view('brand')->with([
            'brand' => Brand::with(['products' => function($query){
                $query->with('photos')->where('visible', true);
            }])->where('brand', $brand)->first()
        ]);
    }
    public function category($category)
    {
        return view('category')->with([
            'category' => Category::with(['products' => function($query){
                $query->with('photos')->where('visible', true);
            }])->where('category', $category)->first()
        ]);
    }
    public function product($id)
    {
        return view('product')->with([
            'product' => Product::find($id)
        ]);
    }
    
}

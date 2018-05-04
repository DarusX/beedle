<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Product;

class PublicController extends Controller
{
    public function brand($brand)
    {
        return view('brand')->with([
            'brand' => Brand::with('products.photos')->where('brand', $brand)->first()
        ]);
    }
    public function category($category)
    {
        return view('category')->with([
            'category' => Category::with(['products' => function($q){
                $q->with(['photos' => function($r){
                    $r->first();
                }]);
            }])->where('brand', $category)->first()
        ]);
    }
    public function product($id)
    {
        return view('product')->with([
            'product' => Product::find($id)
        ]);
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\User;

class BuyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addToCart(Request $request)
    {
        Auth::user()->carts()->create($request->all());
        return redirect()->route('carrito');
    }
    public function removeFromCart($id)
    {
        Cart::destroy($id);
    }
    public function cart()
    {
        return view('buyer.cart');
    }
}

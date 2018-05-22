<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdministratorController extends Controller
{
    public function paidOrders()
    {
        return view('administrator.orders')->with([
            'orders' => Order::where('status', 1)->get()
        ]);
    }
    public function pendingOrders()
    {
        return view('administrator.orders')->with([
            'orders' => Order::where('status', 0)->get()
        ]);
    }
    public function searchOrders()
    {
        return view('administrator.orders')->with([
            'orders' => Order::where('id', 'LIKE', '%'.\Request::input('id').'%')->get()
        ]);
    }
}

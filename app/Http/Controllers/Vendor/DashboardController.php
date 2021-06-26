<?php

namespace App\Http\Controllers\Vendor;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order;

class DashboardController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('vendor.dashboard')->with('orders', $orders)
            ->with('status',['Placed','On Process','Delivered','Cancel']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order;

class DashboardController extends Controller
{
    public function index(){
        $orders =  Order::all();
        return view('admin.dashboard')
        ->with('orders', $orders);
    }
}

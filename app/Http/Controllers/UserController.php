<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\order;
use App\User;
use App\Address;
use Session;

class UserController extends Controller
{
    public function index(Request $r)
    {
        $orders = auth()->user()->orders;
        if(!$res1)
        {
            return view('user.orderHistory')->with('all',[])
                 ->with('products',[])
                 ->with('sale',[]);
        }

          //dd($cart);
         return view('store.history')
         ->with('products', $res)
         ->with("cat", $cat)
         ->with('all',$cart)
         ->with('prods',$product)
         ->with('sale',$res1);
    }

}

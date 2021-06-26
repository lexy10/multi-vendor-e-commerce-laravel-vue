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
        return "Orders";
    }

}

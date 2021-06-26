<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVerifyRequest;
use App\Http\Requests\ProductEditVerifyRequest;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
   public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

    	return view('admin.products')
    		->with('products', $products);

    }




}

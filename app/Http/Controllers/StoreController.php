<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class StoreController extends Controller
{
    public function index()
    {
    	$res = Product::all();
        return view('store.index')
            ->with('products', $res)
            ->with('index', 1);
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);
        return view('store.product')
            ->with('product', $product);
    }

    public function category(Request $request, $id)
    {
        $category = Category::find($id);
        $products = $category->products;
    	return view('store.category_products')
            ->with('products', $products)
            ->with("category", $category);
    }

    public function cart(Request $request)
    {
    	return view('store.cart');
    }

}

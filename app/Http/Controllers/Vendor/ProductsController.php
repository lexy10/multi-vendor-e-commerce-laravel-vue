<?php

namespace App\Http\Controllers\Vendor;

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
        $products = auth()->guard('vendor')->user()->products;

        return view('vendor.products.index')
            ->with('products', $products);

    }

    public function create()
    {
        $categories = Category::all();
        return view('vendor.products.create')
            ->with('categories', $categories);

    }



    public function store(ProductVerifyRequest $request)
    {
        try {

            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->discount = $request->discounted_price;
            $product->vendor_id = auth()->guard('vendor')->id();
            $product->tag = $request->tags;
            //$product->save();
            $name = time().'.'.$request->file('img')->extension();
            $request->file('img')->storeAs(
                'product_images', $name, 'public'
            );
            $product->image_name = $name;
            $product->save();

            return redirect()->route('vendor.products');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

    }


    public function edit($id)
    {
        $categories = Category::all();

        $product = Product::find($id);

        return view('vendor.products.edit')
            ->with('product', $product)
            ->with('categories', $categories);


    }

    public function update(ProductEditVerifyRequest $request, $id)
    {
        $productToUpdate = Product::find($id);
        $productToUpdate->name = $request->name;
        $productToUpdate->description = $request->description;
        $productToUpdate->category_id = $request->category;
        $productToUpdate->price = $request->price;
        $productToUpdate->discount = $request->discounted_price;
        $productToUpdate->tag = $request->tags;
        if ($request->hasFile('img')) {
            //delete previous image
            Storage::delete('storage/product_images/'.$productToUpdate->image_name);

            $name = time().'.'.$request->file('img')->extension();
            $request->file('img')->storeAs(
                'product_images', $name, 'public'
            );
            $productToUpdate->image_name = $name;
        }
        $productToUpdate->save();

        return redirect()->route('vendor.products');

    }

    public function destroy(Request $request, $id)
    {


        $productToDelete = Product::find($id);

        //deleting image folder
        Storage::delete('/product_images/'.$productToDelete->image_name);
        //deleting image folder done


        $productToDelete->delete();

        return redirect()->route('vendor.products');

    }




}

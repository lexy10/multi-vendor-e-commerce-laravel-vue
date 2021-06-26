<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function getProducts()
    {
        sleep(1);
        return ProductResource::collection(Product::all());
    }

    public function getCategories()
    {
        sleep(1);
        return CategoryResource::collection(Category::all());
    }
}

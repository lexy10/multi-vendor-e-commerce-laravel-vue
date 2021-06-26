<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryVerifyRequest;
use App\Http\Requests\CategoryEditVerifyRequest;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;



class CategoriesController extends Controller
{
    public function index()
    {
        $result = Category::all();

    	return view('admin.categories.index')
    		->with('catlist', $result);

    }

    public function store( CategoryVerifyRequest $request)
    {
        $cat = new Category();
        $cat->name = $request->name;
        $cat->type = $request->type;
        $cat->save();
        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {

        $cat = Category::find($id);
        return view('admin.categories.edit')
            ->with('category', $cat);
    }

    public function update(CategoryEditVerifyRequest $request, $id)
    {
        $catToUpdate = Category::find($id);
        $catToUpdate->name = $request->name;
        $catToUpdate->type = $request->type;
        $catToUpdate->save();

        return redirect()->route('admin.categories');
    }

    public function destroy(Request $request)
    {   //Deleting Category related Products
        $productsToDelete = Product::all()->where('category_id', $request->id);

        foreach ($productsToDelete as $prdToDelete)
        {
        //deleting image folder done
        $prdToDelete->delete();

        }

        $catToDelete = Category::find($request->id);
        $catToDelete->delete();


        return redirect()->route('admin.categories');
    }
}

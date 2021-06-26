<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin.index');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');

    Route::group(['middleware' => 'admin'], function () {

        Route::get("dashboard", 'DashboardController@index')->name('admin.dashboard');

        Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

        //categories
        Route::get('categories', 'categoriesController@index')->name('admin.categories');
        Route::post('categories', 'categoriesController@store')->name('admin.categories.store');

        Route::get('categories/edit/{id}', 'categoriesController@edit')->name('admin.categories.edit');
        Route::post('categories/edit/{id}', 'categoriesController@update')->name('admin.categories.update');

        Route::get('categories/delete/{id}', 'categoriesController@destroy')->name('admin.categories.delete');


        //products
        Route::get('products', 'ProductsController@index')->name('admin.products');
        Route::get('products/edit/{id}', 'ProductsController@edit')->name('admin.products.edit');
        Route::put('products/update/{id}', 'ProductsController@update')->name('admin.product.update');

        Route::get('products/delete/{id}', 'productsController@destroy')->name('admin.products.delete');
        //Route::post('products/delete/{id}', 'productsController@destroy');

        //vendors
        Route::get('vendors', 'VendorController@index')->name('admin.vendors');
    });
});

Route::prefix('vendor')->namespace('Vendor')->group(function () {

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('vendor.index');
    Route::post('/login', 'Auth\LoginController@login')->name('vendor.login');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('vendor.register');
    Route::post('/register', 'Auth\RegisterController@register')->name('vendor.completeRegistration');

    Route::group(['middleware' => 'vendor'], function () {
        Route::get('logout', 'Auth\LoginController@logout')->name('vendor.logout');

        Route::get('dashboard', 'DashboardController@index')->name('vendor.dashboard');
        Route::get('products', 'ProductsController@index')->name('vendor.products');
        Route::get('products/create', 'ProductsController@create')->name('vendor.products.create');
        Route::post('products/store', 'ProductsController@store')->name('vendor.product.store');
        Route::get('products/edit/{id}', 'ProductsController@edit')->name('vendor.products.edit');
        Route::put('products/update/{id}', 'ProductsController@update')->name('vendor.product.update');
        Route::get('products/delete/{id}', 'productsController@destroy')->name('vendor.products.delete');
    });
});


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login.form');
Route::post('/login', 'Auth\LoginController@login')->name('user.login');

//signup
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('user.signup');
Route::post('/signup', 'Auth\RegisterController@register')->name('user.register');

//user
Route::get('/', 'StoreController@index')->name('store.home');
Route::get('/products', 'StoreController@index')->name('store.products');
Route::get('/product/{id}', 'StoreController@show')->name('store.product');

Route::get('/category/{id}', 'StoreController@category')->name('store.category');

Route::get('/cart', 'StoreController@cart')->name('store.cart');
Route::get('/checkout', 'StoreController@checkout')->name('store.checkout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/history', 'UserController@index')->name('user.index');
    Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');
});

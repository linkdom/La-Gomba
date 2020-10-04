<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [
    'uses' => 'App\Http\Controllers\ProductController@index',
    'as' => 'products'
]);

Route::get('/mushroom-details/{id}', [
    'uses' => 'App\Http\Controllers\ProductController@detail',
    'as' => 'products'
]);

Route::get('/add-to-cart/{id}', [
        'uses' => 'App\Http\Controllers\ProductController@getAddToCart',
        'as' => 'product.addToCart'
    ]);

Route::get('/blog', [
    'uses' => 'App\Http\Controllers\BlogController@index',
    'as' => 'blog'
]);

Route::get('/post/{id}', [
    'uses' => 'App\Http\Controllers\BlogController@details',
    'as' => 'blog'
]);

Route::get('/shopping-cart', [
    'uses' => 'App\Http\Controllers\ProductController@getCart',
    'as' => 'shoppingCart'
]);

// ADMIN PRODUCTS
Route::get('/admin/products', [
    'uses' => 'App\Http\Controllers\AdminProductsController@index',
    'as' => 'admin.products.index'
]);

Route::get('/admin/products/create', [
    'uses' => 'App\Http\Controllers\AdminProductsController@create',
    'as' => 'admin.products.create'
]);

Route::post('/admin/products/store', [
    'uses' => 'App\Http\Controllers\AdminProductsController@store',
    'as' => 'admin.products.store'
]);

Route::get('/admin/products/edit/{id}', [
    'uses' => 'App\Http\Controllers\AdminProductsController@edit',
    'as' => 'admin.products.edit'
]);

Route::post('/admin/products/update/{id}', [
    'uses' => 'App\Http\Controllers\AdminProductsController@update',
    'as' => 'admin.products.update'
]);

Route::delete('/admin/events/delete/{id}', [
    'uses' => 'App\Http\Controllers\AdminProductsController@destroy',
    'as' => 'admin.products.delete'
]);

// ADMIN BLOG
Route::get('/admin/posts', [
    'uses' => 'App\Http\Controllers\AdminBlogController@index',
    'as' => 'admin.blog.index'
]);

Route::get('/admin/posts/create', [
    'uses' => 'App\Http\Controllers\AdminBlogController@create',
    'as' => 'admin.blog.create'
]);

Route::post('/admin/posts/store', [
    'uses' => 'App\Http\Controllers\AdminBlogController@store',
    'as' => 'admin.blog.store'
]);

// ADMIN HARVESTING PERIODS
Route::get('/admin/harvesting-periods', [
    'uses' => 'App\Http\Controllers\AdminHarvestingPeriodsController@index',
    'as' => 'admin.harvestingPeriods.index'
]);

Route::get('/admin/harvesting-periods/create', [
    'uses' => 'App\Http\Controllers\AdminHarvestingPeriodsController@create',
    'as' => 'admin.harvestingPeriods.create'
]);

Route::post('/admin/harvesting-periods/store', [
    'uses' => 'App\Http\Controllers\AdminHarvestingPeriodsController@store',
    'as' => 'admin.harvestingPeriods.store'
]);

// ADMIN STOCK
Route::get('/admin/stocks', [
    'uses' => 'App\Http\Controllers\AdminStocksController@index',
    'as' => 'admin.stocks.index'
]);

Route::get('/admin/stocks/create', [
    'uses' => 'App\Http\Controllers\AdminStocksController@create',
    'as' => 'admin.stocks.create'
]);

Route::post('/admin/stocks/store', [
    'uses' => 'App\Http\Controllers\AdminStocksController@store',
    'as' => 'admin.stocks.store'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

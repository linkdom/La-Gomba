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


Route::get('/', [
    'uses' => 'App\Http\Controllers\BlogController@index',
    'as' => 'index'
]);

Route::get('/gdpr', function () {
    return view('gdpr');
});

Route::get('/products', [
    'uses' => 'App\Http\Controllers\ProductController@index',
    'as' => 'products'
]);

Route::get('/mushroom-details/{id}', [
    'uses' => 'App\Http\Controllers\ProductController@detail',
    'as' => 'products'
]);

Route::get('/blog', [
    'uses' => 'App\Http\Controllers\AboutController@index',
    'as' => 'blog'
]);

Route::post('/blog/contact', 'App\Http\Controllers\MailSendingController@sendMail');

Route::get('/post/{id}', [
    'uses' => 'App\Http\Controllers\BlogController@details',
    'as' => 'blog'
]);

Route::get('/shopping-cart', [
    'uses' => 'App\Http\Controllers\ProductController@getCart',
    'as' => 'shoppingCart'
]);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/add-to-cart/{id}', [
        'uses' => 'App\Http\Controllers\ProductController@getAddToCart',
        'as' => 'product.addToCart'
    ]);

    Route::get('/add-one/{id}', [
        'uses' => 'App\Http\Controllers\ProductController@getAddOne',
        'as' => 'product.add'
    ]);

    Route::get('/reduce/{id}', [
        'uses' => 'App\Http\Controllers\ProductController@getReduceByOne',
        'as' => 'product.reduceByOne'
    ]);

    Route::get('/remove/{id}', [
        'uses' => 'App\Http\Controllers\ProductController@getRemoveItem',
        'as' => 'product.remove'
    ]);

    Route::get('/checkout', [
        'uses' => 'App\Http\Controllers\OrderController@checkout',
        'as' => 'checkout'
    ]);

    Route::post('/create-payment', "App\Http\Controllers\OrderController@create")->name("create-payment");

    Route::get('/execute-payment', [
        'uses' => 'App\Http\Controllers\OrderController@execute',
        'as' => 'checkout.execute'
    ]);


});

//ADMIN TEXTS

Route::get('/admin/texts', [
    'uses' => 'App\Http\Controllers\AdminTextController@index',
    'as' => 'admin.texts.index'
]);

Route::get('/admin/texts/edit/{id}', [
    'uses' => 'App\Http\Controllers\AdminTextController@edit',
    'as' => 'admin.texts.edit'
]);

Route::post('/admin/texts/update/{id}', [
    'uses' => 'App\Http\Controllers\AdminTextController@update',
    'as' => 'admin.texts.update'
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

Route::delete('/admin/products/delete/{id}', [
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

Route::get('/admin/posts/edit/{id}', [
    'uses' => 'App\Http\Controllers\AdminBlogController@edit',
    'as' => 'admin.blog.edit'
]);

Route::post('/admin/posts/update/{id}', [
    'uses' => 'App\Http\Controllers\AdminBlogController@update',
    'as' => 'admin.blog.update'
]);

Route::delete('/admin/posts/delete/{id}', [
    'uses' => 'App\Http\Controllers\AdminBlogController@destroy',
    'as' => 'admin.blog.delete'
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

Route::get('/admin/harvesting-periods/edit/{id}', [
    'uses' => 'App\Http\Controllers\AdminHarvestingPeriodsController@edit',
    'as' => 'admin.harvestingPeriods.edit'
]);

Route::post('/admin/harvesting-periods/update/{id}', [
    'uses' => 'App\Http\Controllers\AdminHarvestingPeriodsController@update',
    'as' => 'admin.harvestingPeriods.update'
]);

Route::delete('/admin/harvesting-periods/delete/{id}', [
    'uses' => 'App\Http\Controllers\AdminHarvestingPeriodsController@destroy',
    'as' => 'admin.harvestingPeriods.delete'
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

Route::get('/admin/stocks/edit/{id}', [
    'uses' => 'App\Http\Controllers\AdminStocksController@edit',
    'as' => 'admin.stocks.edit'
]);

Route::post('/admin/stocks/update/{id}', [
    'uses' => 'App\Http\Controllers\AdminStocksController@update',
    'as' => 'admin.stocks.update'
]);

Route::delete('/admin/stocks/delete/{id}', [
    'uses' => 'App\Http\Controllers\AdminStocksController@destroy',
    'as' => 'admin.stocks.delete'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [
        'uses' => 'App\Http\Controllers\ProfileController@dashboard',
        'as' => 'dashboard'
]);

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

Route::get('/admin', 'App\Http\Controllers\AdminController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

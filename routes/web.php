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

Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::get('/mushroom-details/{id}', 'App\Http\Controllers\ProductController@detail');

Route::get('/add-to-cart/{id}', [
        'uses' => 'App\Http\Controllers\ProductController@getAddToCart',
        'as' => 'product.addToCart'
    ]);

Route::get('/blog', 'App\Http\Controllers\BlogController@index');
Route::get('/post/{id}', 'App\Http\Controllers\BlogController@details');

Route::get('/shopping-cart', 'App\Http\Controllers\ProductController@getCart');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

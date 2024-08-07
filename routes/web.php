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

Route::middleware('auth')->group(function () {

    // Logout route
    Route::get('signout', 'Auth\LogoutController@index')->name('signout');
});

Route::middleware('guest')->group(function () {
    // Login and register routes
    Route::resource('login', 'Auth\LoginController', ['only' => ['index', 'store']]);
    Route::resource('register', 'Auth\RegisterController', ['only' => ['index', 'store']]);
});

// All routes accessible to authenticated users
Route::get('/', 'ProductController@index')->name('index');
Route::get('/add/new/product', 'ProductController@create')->name('add_new_product');
Route::post('/store_new_product', 'ProductController@store')->name('store_new_product');
Route::delete('/delete/product/{id}', 'ProductController@destroy')->name('delete_product');
Route::get('/edit/product/{id}', 'ProductController@edit')->name('edit_product');

Route::put('/update/product/{id}', 'ProductController@update')->name('update_product');

Route::get('/add/product/type', 'ProductTypeController@create')->name('add_product_types');
Route::post('/store_product_type', 'ProductTypeController@store')->name('store_product_type');
Route::delete('/delete/product_type/{id}', 'ProductTypeController@destroy')->name('delete_product_type');
Route::put('/edit/product_type/{id}', 'ProductTypeController@edit')->name('edit_product_type');
Route::put('/update/product_type/{id}', 'ProductTypeController@update')->name('update_product_type');

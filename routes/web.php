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

//starting page
Route::get('/', 'ProductController@index')->name('index');
//redirect to add new product page
Route::get('/add/new/product', 'ProductController@create')->name('add_new_product');
//handle action of create new product
Route::post('/store_new_product', 'ProductController@store')->name('store_new_product');
Route::delete('/delete/product/{id}', 'ProductController@destroy')->name('delete_product');
//redirect to edit product
Route::get('/edit/product/{id}', 'ProductController@edit')->name('edit_product');
//handle action of update new product
Route::put('/update/product/{id}', 'ProductController@update')->name('update_product');


//redirect to add product type with data
Route::get('/add/product/type', 'ProductTypeController@create')->name('create');
//handle action of create new product type
Route::post('/store_product_type', 'ProductTypeController@store')->name('store_product_type');
//handle delete product type
Route::delete('/delete/product_type/{id}', 'ProductTypeController@destroy')->name('delete_product_type');

Route::put('/edit/product_type/{id}', 'ProductTypeController@edit')->name('edit_product_type');
Route::put('/update/product_type/{id}', 'ProductTypeController@update')->name('update_product_type');

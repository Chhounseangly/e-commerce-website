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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('/', 'HomeController');

Route::middleware('auth')->group(function () {
    // Logout route
    Route::get('signout', 'Auth\LogoutController@index')->name('signout');
});

Route::middleware('authenticated.check')->group(function () {
    // Login and register routes
    Route::resource('login', 'Auth\LoginController', ['only' => ['index', 'store']]);
    Route::resource('register', 'Auth\RegisterController', ['only' => ['index', 'store']]);
});

// === Admin route === 
Route::middleware('admin')->group(function () {
    // Product Routes
    Route::get('/admin', 'ProductController@index')->name('admin.page');
    Route::get('/admin/product/create', 'ProductController@create')->name('admin.product.create');
    Route::post('/admin/product/store', 'ProductController@store')->name('admin.product.store');
    Route::get('/admin/product/{id}/edit', 'ProductController@edit')->name('admin.product.edit');
    Route::put('/admin/product/{id}/update', 'ProductController@update')->name('admin.product.update');
    Route::delete('/admin/product/{id}/delete', 'ProductController@destroy')->name('admin.delete.product');
    //Product Type Routes
    Route::get('/admin/product-type', 'ProductTypeController@index')->name('admin.product-type.home');
    Route::get('/admin/product-type/create', 'ProductTypeController@create')->name('admin.product-type.create');
    Route::post('/admin/product-type/store', 'ProductTypeController@store')->name('admin.product-type.store');
    Route::get('/admin/product-type/{id}/edit', 'ProductTypeController@edit')->name('admin.product-type.edit');
    Route::put('/admin/product-type/{id}/update', 'ProductTypeController@update')->name('admin.product-type.update');
    Route::delete('/admin/product-type/{id}/delete', 'ProductTypeController@destroy')->name('admin.product-type.delete');
});

Route::middleware('superadmin')->group(function () {
    Route::resource('/superadmin', 'Auth\UserController');
});

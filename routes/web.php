<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', 'HomeController');
Route::get('lang/{lang}', 'LangController@setLocalLang')->name('setLang');

Route::namespace('Auth')->group(function () {
    Route::middleware('auth')->group(function () {
        // Logout route
        Route::get('signout', 'LogoutController@index')->name('signout');
    });
    Route::middleware('authenticated.check')->group(function () {
        // Login and register routes
        Route::resource('login', 'LoginController', ['only' => ['index', 'store']]);
        Route::resource('register', 'RegisterController', ['only' => ['index', 'store']]);
    });
});

// === Admin route === 
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Product Routes
    Route::get('/', 'ProductController@index')->name('page');
    Route::name('product.')->prefix('product')->group(function () {
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/{id}/edit', 'ProductController@edit')->name('edit');
        Route::put('/{id}/update', 'ProductController@update')->name('update');
        Route::delete('/{id}/delete', 'ProductController@destroy')->name('delete');
    });
    //Product Type Routes
    Route::name('product-type.')->prefix('product-type')->group(function () {
        Route::get('/', 'ProductTypeController@index')->name('home');
        Route::get('/create', 'ProductTypeController@create')->name('create');
        Route::post('/store', 'ProductTypeController@store')->name('store');
        Route::get('/{id}/edit', 'ProductTypeController@edit')->name('edit');
        Route::put('/{id}/update', 'ProductTypeController@update')->name('update');
        Route::delete('/{id}/delete', 'ProductTypeController@destroy')->name('delete');
    });
});

Route::middleware('superadmin')->group(function () {
    Route::resource('/superadmin', 'Auth\UserController');
});

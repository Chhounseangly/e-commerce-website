<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('product/{id}', 'ProductController@getProductByApi');

//routes product
Route::prefix('admin/product')->group(function () {
    Route::get('/', 'ProductController@getAllProducts');
    Route::post('/', 'ProductController@createProduct');
    Route::get('/{product}', 'ProductController@getDetailProduct');
    Route::put('/{product}', 'ProductController@editProduct');
    Route::delete('/{product}', 'ProductController@deleteProduct');
});

//routes product types
Route::prefix('superadmin/product/type')->group(function () {
    Route::get('/', 'ProductTypeController@getAllProductTypes');
    Route::post('/', 'ProductTypeController@createProductType');
    Route::get('/{product_type}', 'ProductTypeController@getOneProductType');
    Route::put('/{product_type}', 'ProductTypeController@editProductType');
    Route::delete('/{product_type}', 'ProductTypeController@deleteProductType');
});

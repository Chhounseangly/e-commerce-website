<?php

use App\Product;
use Illuminate\Support\Facades\Route;

use function Psy\bin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/add-product', 'ProductController@addProductByApi');

// Route::post('/add-product-type', 'ProductTypeController@store');
// Route::get('/get-product-type', 'ProductTypeController@index');

// Route::get('product/{product}', 'ProductController@getProducts');
Route::get('product/{id}', 'ProductController@getProductByApi');

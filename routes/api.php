<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('category', 'API\CategoryController')->names('api.category');
Route::apiResource('product', 'API\ProductController')->names('api.product');

Route::delete('/eliminarImagen/{id}', 'API\ProductController@eliminarImagen')->name('api.eliminarImagen');

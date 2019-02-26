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

Route::get('produtos/{categoria?}', 'Api\Produtos@listProducts');
Route::get('/image/produtos/{id}', 'Api\Produtos@getProductImage');
Route::get('/produto/{id}', 'Api\Produtos@show');
Route::get('/carrinho', 'Api\CartController@getItems');

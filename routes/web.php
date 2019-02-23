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

Route::get('/', function () {

});

Auth::routes();

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/produtos', 'Admin\ProductsController@index')->name('produtos.list');
    Route::get('/produtos/novo', 'Admin\ProductsController@create')->name('produtos.create');
    Route::get('/produtos/{id}/edit', 'Admin\ProductsController@edit')->name('produtos.edit');
    Route::post('/produtos/{id}/edit', 'Admin\ProductsController@store')->name('produtos.update');
    Route::post('/produtos/novo', 'Admin\ProductsController@store')->name('produtos.post');
});



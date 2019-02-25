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

Route::get('/', 'Store\IndexController@index');

Auth::routes();

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/produtos', 'Admin\ProductsController@index')->name('produtos.list');
    Route::get('/produtos/novo', 'Admin\ProductsController@create')->name('produtos.create');
    Route::get('/produtos/{id}/edit', 'Admin\ProductsController@edit')->name('produtos.edit');
    Route::post('/produtos/{id}/edit', 'Admin\ProductsController@store')->name('produtos.update');
    Route::post('/produtos/novo', 'Admin\ProductsController@store')->name('produtos.post');

    Route::get('/categories', 'Admin\CategoryController@index')->name('categories.list');
    Route::get('/categories/novo', 'Admin\CategoryController@create')->name('categories.create');
    Route::get('/categories/{id}/edit', 'Admin\CategoryController@edit')->name('categories.edit');
    Route::post('/categories/{id}/edit', 'Admin\CategoryController@update')->name('categories.update');
    Route::post('/categories/novo', 'Admin\CategoryController@store')->name('categories.post');
});



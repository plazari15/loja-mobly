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

Route::get('/teste', function (){
//    $cart = new \App\Helpers\Cart();
//
//    return [$cart->getPrice()];

    [\App\Product::addAllToIndex()];

    return [\App\Product::searchByQuery(['wildcard' => ['name' => 'calça']])];
});

Route::get('/', 'Store\IndexController@index');
Route::get('/categoria/{slug}', 'Store\IndexController@category')->name('produtos.listagem');
Route::get('/produto/{id}', 'Store\IndexController@produto')->name('produtos.show');
Route::get('add/produto/{id}', 'Api\Produtos@addToCart')->name('add.produto');
Route::get('/produto/add/{id}', 'Api\Produtos@addToCart');
Route::get('/carrinho', 'Store\CartControllerStore@index')->name('carrinho');
Route::get('/checkout', 'Store\CheckoutController@index')->name('checkout');
Route::post('/checkout/register', 'Store\CheckoutController@register')->name('client.register');
Route::get('/checkout/login', 'Store\CheckoutController@index')->name('client.login');
Route::get('/search/', 'Store\IndexController@search');

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



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
Route::get('/marcas/{brand}', 'PublicController@brand')->name('marca');
Route::get('/categorias/{category}', 'PublicController@category')->name('categoria');
Route::get('/articulo/{id}', 'PublicController@product')->name('producto');

Route::prefix('/cliente')->group(function(){
    Route::get('/carrito', 'BuyerController@cart')->name('cart');
    Route::post('/cart/add', 'BuyerController@addToCart')->name('buyer.add_to_cart');
    Route::delete('/cart/{id}/remove', 'BuyerController@removeFromCart')->name('buyer.remove_from_cart');
});

Route::prefix('json')->group(function(){
    Route::prefix('category')->group(function(){
        Route::get('all', 'ResourceController@categories')->name('category.json.all');
    });
    Route::prefix('brand')->group(function(){
        Route::get('all', 'ResourceController@brands')->name('brand.json.all');
    });
});

Route::prefix('product')->group(function(){
    Route::post('/{id}/colors', 'ProductController@colors')->name('product.colors');
});

Route::resources([
    'category' => 'CategoryController',
    'brand' => 'BrandController',
    'product' => 'ProductController',
    'photo' => 'PhotoController',
    'color' => 'ColorController'
]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

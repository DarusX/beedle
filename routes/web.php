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
    Route::get('/carrito', 'ClientController@cart')->name('client.cart');
    Route::post('/cart/add', 'ClientController@addToCart')->name('client.add');
    Route::delete('/cart/{id}/remove', 'ClientController@removeFromCart')->name('client.remove');
    Route::post('/order/generate', 'ClientController@generateOrder')->name('client.generate.order');
    Route::post('/order/pay', 'ClientController@payOrder')->name('client.pay.order');
    Route::get('/order/{id}/generate/payment', 'ClientController@generatePayment')->name('client.generate.payment');
    Route::post('/deal/validate', 'ClientController@validateCode')->name('deal.validate');
    Route::get('/order/{id}', 'ClientController@order')->name('client.order');
});

Route::prefix('/administrador')->group(function(){
    Route::get('orders/paid', 'AdministratorController@paidOrders')->name('admin.orders.paid');
    Route::get('orders/pending', 'AdministratorController@pendingOrders')->name('admin.orders.pending');
    Route::get('orders/search', 'AdministratorController@searchOrders')->name('admin.orders.search');
});

Route::prefix('json')->group(function(){
    Route::prefix('category')->group(function(){
        Route::get('all', 'ResourceController@categories')->name('category.json.all');
    });
    Route::prefix('brand')->group(function(){
        Route::get('all', 'ResourceController@brands')->name('brand.json.all');
    });
    Route::prefix('state')->group(function(){
        Route::get('all', 'ResourceController@states')->name('state.json.all');
        Route::get('{id}', 'ResourceController@municipalities')->name('state.json');
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
    'color' => 'ColorController',
    'state' => 'StateController',
    'deal' => 'DealController',
    'banner' => 'BannerController'
]);

Route::get('/', 'PublicController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

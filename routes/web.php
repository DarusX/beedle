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
Route::get('/marcas/{brand}', 'PublicController@brand');
Route::get('/categorias/{category}', 'PublicController@category');

Route::prefix('json')->group(function(){
    Route::prefix('category')->group(function(){
        Route::get('all', 'ResourceController@categories')->name('category.json.all');
    });
    Route::prefix('brand')->group(function(){
        Route::get('all', 'ResourceController@brands')->name('brand.json.all');
    });
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

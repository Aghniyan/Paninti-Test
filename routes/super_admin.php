<?php

use Illuminate\Support\Facades\Route;

/**
 * Route untuk halaman Super admin dengan perfix 'api/super'
 * ex : http://localhost:8000/api/super/xxxxxxx
 */

Route::post('register','Api\AuthController@register');

//Route CRUD TOKO dan Assign Admin Toko
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('shop','Api\ShopController@index');
    Route::get('shop/{id}','Api\ShopController@show');
    Route::post('shop','Api\ShopController@store');
    Route::put('shop/{id}','Api\ShopController@update');
    Route::delete('shop/{id}','Api\ShopController@destroy');

    Route::put('assign/{id}','Api\ShopController@assign');
    // Route::put('shop/{id}/detail','Api\ShopController@update_detail');
});

//Route CRUD Admin di Super Admin
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user','Api\UserController@index');
    Route::get('user/{id}','Api\UserController@show');
    Route::post('user','Api\UserController@store');
    Route::put('user/{id}','Api\UserController@update');
    Route::delete('user/{id}','Api\UserController@destroy');
});

//Route CRUD Produk di Super admin
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('product','Api\ProductController@index');
    Route::get('product/{id}','Api\ProductController@show');
    Route::get('product/shop/{id}','Api\ProductController@show_shop');
    Route::post('product/shop/{shop:id}','Api\ProductController@store');
    Route::put('product/{id}','Api\ProductController@update');
    Route::delete('product/{id}','Api\ProductController@destroy');
});

//Route CRUD Kategori Produk di Super admin
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('category','Api\CategoryController@index');
    Route::get('category/{id}','Api\CategoryController@show');
    Route::get('category/shop/{id}','Api\CategoryController@show_shop');
    Route::post('category','Api\CategoryController@store');
    Route::put('category/{id}','Api\CategoryController@update');
    Route::delete('category/{id}','Api\CategoryController@destroy');
});

//Route CRUD STOK Produk di Super admin
Route::group(['prefix' => 'stock','middleware' => 'auth:api'], function () {

});



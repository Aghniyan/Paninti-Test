<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login','Api\AuthController@login');
Route::post('cek','Api\AuthController@cek_user')->middleware('auth:api');

//Route CRUD TOKO dan Assign Admin Toko
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('shop','Api\ShopController@index');
    Route::get('shop/{id}','Api\ShopController@show');
    Route::put('shop/{id}','Api\ShopController@update');
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
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('stock','Api\StockController@index');
    Route::get('stock/{id}','Api\StockController@show');
    Route::get('stock/shop/{id}','Api\StockController@show_shop');
    Route::post('stock/{id}','Api\StockController@store');
    Route::put('stock/{id}','Api\StockController@update');
    Route::delete('stock/{id}','Api\StockController@destroy');
});


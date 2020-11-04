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

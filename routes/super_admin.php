<?php

use Illuminate\Support\Facades\Route;
/**
 * Route untuk halaman Super admin dengan perfix 'super'
 * ex : http://localhost:8000/super/user
 */

Route::get('user','UserController@index');

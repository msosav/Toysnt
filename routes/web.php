<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

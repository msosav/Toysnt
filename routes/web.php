<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index')->middleware('landing.page');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index')->middleware('admin');

//Rutas de Technique.
Route::get('/techniques', 'App\Http\Controllers\TechniqueController@index')->name('technique.index')->middleware('basic.users');
Route::get('/technique/{id}', 'App\Http\Controllers\TechniqueController@show')->name('technique.show')->middleware('basic.users');

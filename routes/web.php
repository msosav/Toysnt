<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

//Rutas de Technique.
Route::get('/technique', 'App\Http\Controllers\TechniqueController@index')->name('technique.index');
Route::get('/technique/{id}', 'App\Http\Controllers\TechniqueController@show')->name('technique.show');

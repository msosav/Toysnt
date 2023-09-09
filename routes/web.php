<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

//Rutas de Admin.
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
//Rutas de AdminToy.
Route::get('/admin/toy', 'App\Http\Controllers\AdminToyController@index')->name('admin.toy.index');

//Rutas de Technique.
Route::get('/techniques', 'App\Http\Controllers\TechniqueController@index')->name('technique.index');
Route::get('/technique/{id}', 'App\Http\Controllers\TechniqueController@show')->name('technique.show');

//Rutas de Toy.
Route::get('/toys', 'App\Http\Controllers\ToyController@index')->name('toy.index');
Route::get('/toy/{id}', 'App\Http\Controllers\ToyController@show')->name('toy.show');

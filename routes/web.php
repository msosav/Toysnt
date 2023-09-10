<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

//Rutas de Admin.
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
//Rutas de AdminToy.
Route::get('/admin/toys', 'App\Http\Controllers\AdminToyController@index')->name('admin.toy.index');
Route::get('/admin/toys/create', 'App\Http\Controllers\AdminToyController@create')->name('admin.toy.create');
Route::post('/admin/toys/save', 'App\Http\Controllers\AdminToyController@save')->name('admin.toy.save');
Route::get('/admin/toys/edit/{id}', 'App\Http\Controllers\AdminToyController@edit')->name('admin.toy.edit');
Route::post('/admin/toys/update/{id}', 'App\Http\Controllers\AdminToyController@update')->name('admin.toy.update');
Route::get('/admin/toys/{id}', 'App\Http\Controllers\AdminToyController@show')->name('admin.toy.show');

//Rutas de Technique.
Route::get('/techniques', 'App\Http\Controllers\TechniqueController@index')->name('technique.index');
Route::get('/technique/{id}', 'App\Http\Controllers\TechniqueController@show')->name('technique.show');

//Rutas de Toy.
Route::get('/toys', 'App\Http\Controllers\ToyController@index')->name('toy.index');
Route::get('/toy/{id}', 'App\Http\Controllers\ToyController@show')->name('toy.show');

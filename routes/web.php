<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index')->middleware('landing.page');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index')->middleware('admin');

//Rutas de AdminToy.
Route::get('/admin/toys', 'App\Http\Controllers\AdminToyController@index')->name('admin.toy.index');
Route::get('/admin/toys/create', 'App\Http\Controllers\AdminToyController@create')->name('admin.toy.create');
Route::post('/admin/toys/save', 'App\Http\Controllers\AdminToyController@save')->name('admin.toy.save');
Route::get('/admin/toys/edit/{id}', 'App\Http\Controllers\AdminToyController@edit')->name('admin.toy.edit');
Route::post('/admin/toys/update/{id}', 'App\Http\Controllers\AdminToyController@update')->name('admin.toy.update');
Route::get('/admin/toys/delete/{id}', 'App\Http\Controllers\AdminToyController@delete')->name('admin.toy.delete');
Route::get('/admin/toys/{id}', 'App\Http\Controllers\AdminToyController@show')->name('admin.toy.show');

//Rutas de Technique.
Route::get('/techniques', 'App\Http\Controllers\TechniqueController@index')->name('technique.index')->middleware('basic.users');
Route::get('/technique/{id}', 'App\Http\Controllers\TechniqueController@show')->name('technique.show')->middleware('basic.users');

//Rutas de AdminTechnique
Route::get('/admin/technique', 'App\Http\Controllers\AdminTechniqueController@index')->name('admin.technique.index');
Route::get('/admin/technique/create', 'App\Http\Controllers\AdminTechniqueController@create')->name('admin.technique.create');
Route::post('/admin/technique/save', 'App\Http\Controllers\AdminTechniqueController@save')->name('admin.technique.save');
Route::get('/admin/technique/edit/{id}', 'App\Http\Controllers\AdminTechniqueController@edit')->name('admin.technique.edit');
Route::post('/admin/technique/update/{id}', 'App\Http\Controllers\AdminTechniqueController@update')->name('admin.technique.update');
Route::get('/admin/technique/delete/{id}', 'App\Http\Controllers\AdminTechniqueController@delete')->name('admin.technique.delete');
Route::get('/admin/technique/{id}', 'App\Http\Controllers\AdminTechniqueController@show')->name('admin.technique.show');

//Rutas de Toy.
Route::get('/toys', 'App\Http\Controllers\ToyController@index')->name('toy.index');
Route::get('/toy/{id}', 'App\Http\Controllers\ToyController@show')->name('toy.show');

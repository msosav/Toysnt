<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'App\Http\Controllers\ToyController@index')->name('toy.index')->middleware('landing.page');
Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index')->middleware('admin');

//Rutas de AdminToy.
Route::get('/admin/toys', 'App\Http\Controllers\Admin\AdminToyController@index')->name('admin.toy.index')->middleware('admin');
Route::get('/admin/toys/create', 'App\Http\Controllers\Admin\AdminToyController@create')->name('admin.toy.create')->middleware('admin');
Route::post('/admin/toys/save', 'App\Http\Controllers\Admin\AdminToyController@save')->name('admin.toy.save')->middleware('admin');
Route::get('/admin/toys/edit/{id}', 'App\Http\Controllers\Admin\AdminToyController@edit')->name('admin.toy.edit')->middleware('admin');
Route::post('/admin/toys/update/{id}', 'App\Http\Controllers\Admin\AdminToyController@update')->name('admin.toy.update')->middleware('admin');
Route::get('/admin/toys/delete/{id}', 'App\Http\Controllers\Admin\AdminToyController@delete')->name('admin.toy.delete')->middleware('admin');
Route::get('/admin/toys/{id}', 'App\Http\Controllers\Admin\AdminToyController@show')->name('admin.toy.show')->middleware('admin');

//Rutas de AdminUser.
Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index')->middleware('admin');
Route::get('/admin/users/create', 'App\Http\Controllers\Admin\AdminUserController@create')->name('admin.user.create')->middleware('admin');
Route::post('/admin/user/save', 'App\Http\Controllers\Admin\AdminUserController@save')->name('admin.user.save')->middleware('admin');
Route::get('/admin/users/edit/{id}', 'App\Http\Controllers\Admin\AdminUserController@edit')->name('admin.user.edit')->middleware('admin');
Route::post('/admin/users/update/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.user.update')->middleware('admin');
Route::get('/admin/users/delete/{id}', 'App\Http\Controllers\Admin\AdminUserController@delete')->name('admin.user.delete')->middleware('admin');
Route::get('/admin/users/{id}', 'App\Http\Controllers\Admin\AdminUserController@show')->name('admin.user.show')->middleware('admin');

//Rutas de Technique.
Route::get('/techniques', 'App\Http\Controllers\TechniqueController@index')->name('technique.index')->middleware('basic.users');
Route::get('/technique/{id}', 'App\Http\Controllers\TechniqueController@show')->name('technique.show')->middleware('basic.users');

//Rutas de AdminTechnique
Route::get('/admin/technique', 'App\Http\Controllers\AdminTechniqueController@index')->name('admin.technique.index')->middleware('admin');
Route::get('/admin/technique/create', 'App\Http\Controllers\AdminTechniqueController@create')->name('admin.technique.create')->middleware('admin');
Route::post('/admin/technique/save', 'App\Http\Controllers\AdminTechniqueController@save')->name('admin.technique.save')->middleware('admin');
Route::get('/admin/technique/edit/{id}', 'App\Http\Controllers\AdminTechniqueController@edit')->name('admin.technique.edit')->middleware('admin');
Route::post('/admin/technique/update/{id}', 'App\Http\Controllers\AdminTechniqueController@update')->name('admin.technique.update')->middleware('admin');
Route::get('/admin/technique/delete/{id}', 'App\Http\Controllers\AdminTechniqueController@delete')->name('admin.technique.delete')->middleware('admin');
Route::get('/admin/technique/{id}', 'App\Http\Controllers\AdminTechniqueController@show')->name('admin.technique.show')->middleware('admin');

//Rutas de AdminReview
Route::get('/admin/review', 'App\Http\Controllers\AdminReviewController@index')->name('admin.review.index')->middleware('admin');
Route::get('/admin/review/create', 'App\Http\Controllers\AdminReviewController@create')->name('admin.review.create')->middleware('admin');
Route::post('/admin/review/save', 'App\Http\Controllers\AdminReviewController@save')->name('admin.review.save')->middleware('admin');
Route::get('/admin/review/edit/{id}', 'App\Http\Controllers\AdminReviewController@edit')->name('admin.review.edit')->middleware('admin');
Route::post('/admin/review/update/{id}', 'App\Http\Controllers\AdminReviewController@update')->name('admin.review.update')->middleware('admin');
Route::get('/admin/review/delete/{id}', 'App\Http\Controllers\AdminReviewController@delete')->name('admin.review.delete')->middleware('admin');
Route::get('/admin/review/{id}', 'App\Http\Controllers\AdminReviewController@show')->name('admin.review.show')->middleware('admin');

//Rutas de Toy.
Route::get('/toy/{id}', 'App\Http\Controllers\ToyController@show')->name('toy.show')->middleware('basic.users');

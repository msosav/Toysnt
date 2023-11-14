<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Rutas de Auth.
Auth::routes();

Route::get('locale/{locale}', 'App\Http\Controllers\HomeController@changeLocale')->name('changeLocale');

//Rutas de Home.
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index')->middleware('landing.page');

//Rutas de Technique.
Route::post('/techniques/search', 'App\Http\Controllers\TechniqueController@search')->name('technique.search');
Route::get('/techniques/results/{name}', 'App\Http\Controllers\TechniqueController@results')->name('technique.results');
Route::get('/techniques', 'App\Http\Controllers\TechniqueController@index')->name('technique.index');
Route::get('/technique/{id}', 'App\Http\Controllers\TechniqueController@show')->name('technique.show');

//Rutas de Toy.
Route::get('/toys', 'App\Http\Controllers\ToyController@index')->name('toy.index');
Route::post('/toys/search', 'App\Http\Controllers\ToyController@search')->name('toy.search');
Route::get('/toys/results/{name}', 'App\Http\Controllers\ToyController@results')->name('toy.results');
Route::get('/toy/{id}', 'App\Http\Controllers\ToyController@show')->name('toy.show');

//Rutas de Cart.
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');

//Rutas de Review.
Route::post('/review/save/{type}/{id}', 'App\Http\Controllers\ReviewController@save')->name('review.save');

Route::middleware('auth')->group(function () {
    //Rutas de Order
    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::get('/purchase', 'App\Http\Controllers\OrderController@purchase')->name('order.purchase');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');

    //Rutas de AdminToy.
    Route::get('/admin/toys', 'App\Http\Controllers\Admin\AdminToyController@index')->name('admin.toy.index');
    Route::get('/admin/toys/create', 'App\Http\Controllers\Admin\AdminToyController@create')->name('admin.toy.create');
    Route::post('/admin/toys/save', 'App\Http\Controllers\Admin\AdminToyController@save')->name('admin.toy.save');
    Route::get('/admin/toys/edit/{id}', 'App\Http\Controllers\Admin\AdminToyController@edit')->name('admin.toy.edit');
    Route::post('/admin/toys/update/{id}', 'App\Http\Controllers\Admin\AdminToyController@update')->name('admin.toy.update');
    Route::get('/admin/toys/delete/{id}', 'App\Http\Controllers\Admin\AdminToyController@delete')->name('admin.toy.delete');
    Route::get('/admin/toys/{id}', 'App\Http\Controllers\Admin\AdminToyController@show')->name('admin.toy.show');

    //Rutas de AdminUser.
    Route::get('/admin/users/create', 'App\Http\Controllers\Admin\AdminUserController@create')->name('admin.user.create');
    Route::post('/admin/user/save', 'App\Http\Controllers\Admin\AdminUserController@save')->name('admin.user.save');
    Route::get('/admin/users/edit/{id}', 'App\Http\Controllers\Admin\AdminUserController@edit')->name('admin.user.edit');
    Route::post('/admin/users/update/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.user.update');
    Route::get('/admin/users/delete/{id}', 'App\Http\Controllers\Admin\AdminUserController@delete')->name('admin.user.delete');
    Route::get('/admin/users/{id}', 'App\Http\Controllers\Admin\AdminUserController@show')->name('admin.user.show');

    //Rutas de AdminTechnique
    Route::get('/admin/techniques', 'App\Http\Controllers\Admin\AdminTechniqueController@index')->name('admin.technique.index');
    Route::get('/admin/techniques/create', 'App\Http\Controllers\Admin\AdminTechniqueController@create')->name('admin.technique.create');
    Route::post('/admin/techniques/save', 'App\Http\Controllers\Admin\AdminTechniqueController@save')->name('admin.technique.save');
    Route::get('/admin/techniques/edit/{id}', 'App\Http\Controllers\Admin\AdminTechniqueController@edit')->name('admin.technique.edit');
    Route::post('/admin/techniques/update/{id}', 'App\Http\Controllers\Admin\AdminTechniqueController@update')->name('admin.technique.update');
    Route::get('/admin/techniques/delete/{id}', 'App\Http\Controllers\Admin\AdminTechniqueController@delete')->name('admin.technique.delete');
    Route::get('/admin/techniques/{id}', 'App\Http\Controllers\Admin\AdminTechniqueController@show')->name('admin.technique.show');

    //Rutas de AdminReview
    Route::get('/admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name('admin.review.index');
    Route::get('/admin/reviews/create', 'App\Http\Controllers\Admin\AdminReviewController@create')->name('admin.review.create');
    Route::post('/admin/reviews/save', 'App\Http\Controllers\Admin\AdminReviewController@save')->name('admin.review.save');
    Route::get('/admin/reviews/edit/{id}', 'App\Http\Controllers\Admin\AdminReviewController@edit')->name('admin.review.edit');
    Route::post('/admin/reviews/update/{id}', 'App\Http\Controllers\Admin\AdminReviewController@update')->name('admin.review.update');
    Route::get('/admin/reviews/delete/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name('admin.review.delete');
    Route::get('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@show')->name('admin.review.show');

    //Rutas de AdminOrder
    Route::get('/admin/orders', 'App\Http\Controllers\Admin\AdminOrderController@index')->name('admin.order.index');
    Route::get('/admin/orders/show', 'App\Http\Controllers\Admin\AdminOrderController@show')->name('admin.order.show');
});

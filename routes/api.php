<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Servicio web
Route::get('/bestsellers/view', 'App\Http\Controllers\Api\ServiceController@showToys')->name('service.show');

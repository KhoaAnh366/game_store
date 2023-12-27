<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
return view('index');
});


Route::get('product/index', [ProductController::class, 'index']);

Route::get('product/create', [ProductController::class, 'create']);
Route::post('product/postCreate', [ProductController::class, 'postCreate']);

Route::get('product/update/{id}', [ProductController::class, 'update']);
Route::post('product/postUpdate/{id}', [ProductController::class, 'postUpdate']);

Route::get('product/delete/{id}', [ProductController::class, 'delete']);

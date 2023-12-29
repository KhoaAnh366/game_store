<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('index');
});


//Phần kết nối ProductController
Route::get('product/index', [ProductController::class, 'index']);

Route::get('product/create', [ProductController::class, 'create']);
Route::post('product/postCreate', [ProductController::class, 'postCreate']);

Route::get('product/update/{id}', [ProductController::class, 'update']);
Route::post('product/postUpdate/{id}', [ProductController::class, 'postUpdate']);

Route::get('product/delete/{id}', [ProductController::class, 'delete']);



//Phần kết nối AccountController
Route::get('index', [AccountController::class, 'index']);
Route::get('login', [AccountController::class, 'login']);


Route::prefix('admin')->name('admin')->middleware('checkLogin')->group(function () {
    Route::get('users', [AccountController::class, 'users']);

    Route::get('displayAddUser', [AccountController::class, 'displayAddUser']);
    Route::post('addUser', [AccountController::class, 'addUser']);

    Route::get('resetPassword/{id}', [AccountController::class, 'resetPassword']);
});


Route::prefix('user')->name('user')->middleware('checkLogin')->group(function () {
    Route::get('details/{id}', [AccountController::class, 'details'])->name("profile");
});


Route::get('logout', [AccountController::class, 'logout']);

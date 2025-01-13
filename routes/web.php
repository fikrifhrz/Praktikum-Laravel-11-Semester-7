<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
return view('welcome');
});

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('register', [UserController::class, 'index']);


Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/categorys', \App\Http\Controllers\CategoryController::class);
Route::resource('/satuans', \App\Http\Controllers\SatuanController::class);
Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
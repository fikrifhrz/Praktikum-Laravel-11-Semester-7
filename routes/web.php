<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
return view('welcome');
});

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('register', [UserController::class, 'index']);
Route::get('printpdf', [UserController::class, 'printPDF'])->name('printuser');
Route::get('printexcel', [UserController::class, 'userExcel'])->name('exportuser');

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
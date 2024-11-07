<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('home', function () {
    return view('home');
});
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('stocks', StockController::class);
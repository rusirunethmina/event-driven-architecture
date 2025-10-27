<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;



Route::post('/product', [ProductController::class, 'store']);
Route::post('/order', [OrderController::class, 'store']);

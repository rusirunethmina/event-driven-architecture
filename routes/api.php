<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::post('/product', [ProductController::class, 'store']);

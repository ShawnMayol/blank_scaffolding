<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cart-items', [CartItemController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'process']);
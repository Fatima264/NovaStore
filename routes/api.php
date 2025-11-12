<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'removeFromCart']);

    Route::post('/order/checkout', [OrderController::class, 'order']);
    Route::get('/orders', [OrderController::class, 'getAllUserOrders']);
    Route::get('/order/{id}', [OrderController::class, 'getOrderById']);
});

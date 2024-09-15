<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/products', [ProductsController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::put('/users/{id}', [UserController::class, 'update']);

    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    Route::put('/products/{id}', [ProductsController::class, 'update']);

    Route::get('/orders', [OrdersController::class, 'index']);

    Route::post('/orders', [OrdersController::class, 'store']);

    Route::get('/orders/{id}', [OrdersController::class, 'show']);

    Route::put('/orders/{id}', [OrdersController::class, 'update']);

    Route::delete('/orders/{id}', [OrdersController::class, 'destroy']);

    
    Route::get('/user/profile', function () {
        return Auth::user();
    });

    Route::middleware('auth:sanctum')->get('/admin', function (Request $request) {
        return response()->json([
            'message' => 'Hey there, Admin!',
        ]);
    });
});
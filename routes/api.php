<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//GUEST ROUTES
Route::middleware('guest')->group(function () {
    Route::post('register', [App\Http\Controllers\UserController::class, 'register']);
    Route::post('login', [App\Http\Controllers\UserController::class, 'login']);
});

//ROUTES WITH TOKEN
Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

//ROUTES WITH ADMIN ROLE
Route::get('/task_middleware',[TaskController::class,'exampleMiddleware'])->middleware('Auth');
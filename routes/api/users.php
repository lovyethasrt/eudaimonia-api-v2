<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show')->missing(fn()=> response()->notFound('User does not exist'));
        Route::get('/profile', 'profile')->middleware('auth:sanctum');
    });
    Route::post('/register', 'create')->middleware('register');
    Route::post('/login', 'login')->middleware('is.verified');
});



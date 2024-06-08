<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::post('/register', 'create')->middleware('register');
    Route::post('/login', 'login')->middleware('is.verified');
    Route::get('/users/profile', 'profile')->middleware('auth:sanctum');
});



<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::post('/register', 'create')->middleware('register');
});

Route::get('/tes', function(){
    return 'OK';
})->middleware(['is.verified', 'is.admin']);
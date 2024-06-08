<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::prefix('/{product}')->group(function () {
        Route::get('/', 'show')
            ->missing(function () {
                return response()->notFound('Product does not exist.');
            });
        Route::put('/', 'update')
            ->missing(function () {
                return response()->notFound('Product does not exist.');
            });
        Route::delete('/', 'destroy')
            ->missing(function () {
                return response()->notFound('Product does not exist.');
            });
    });
});

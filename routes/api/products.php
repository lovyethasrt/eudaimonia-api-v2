<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index');
    Route::get('/{product}', 'show')
        ->missing(function () {
            return response()->notFound('Product does not exist.');
        });
});

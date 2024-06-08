<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Support\Facades\Route;


Route::prefix('product-types')
    ->controller(ProductTypeController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::delete('/{id}', 'destroy')
        ->missing(function(){
            return response()->notFound('Product Type does not exist.');
        });
    });

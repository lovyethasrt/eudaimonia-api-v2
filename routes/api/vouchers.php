<?php 
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

Route::prefix('vouchers')
->controller(VoucherController::class)
->group(function(){
    Route::get('/', 'index');
    Route::get('/{id}', 'show')->missing(function(){
        return response()->notFound('Voucher does not exist.');
    });
    Route::patch('/{id}', 'update')->missing(function(){
        return response()->notFound('Voucher does not exist.');
    });
    Route::delete('/{id}', 'destroy')->missing(function(){
        return response()->notFound('Voucher does not exist.');
    });
});
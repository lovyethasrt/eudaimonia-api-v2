<?php



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tes-admin', function (Request $r) {
        return response()->success('OK');
    })->middleware('abilities:products:manage');

    Route::get('/tes-buyer', function (Request $r) {
        return response()->success('OK');
    });
});

Route::get('/tes-no-auth', function (Request $r) {
    return response()->success('OK');
});



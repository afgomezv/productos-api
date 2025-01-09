<?php

use App\Http\Controllers\api\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(productController::class)->group(function(){
    Route::get('products', 'index'); ;
    Route::post('products', 'create');

    Route::get('products/{id}', 'show');
    Route::put('products/{id}', 'update');
    Route::delete('products/{id}', 'destroy');
});


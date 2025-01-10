<?php

use App\Http\Controllers\Api\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("products", [productController::class, "index"]);
Route::post("products", [productController::class, "store"]);

Route::get("products/{id}", function(){
    return "Get a Product";
});

Route::put("products/{id}", function(){
    return "Update a Product";
});

Route::delete("products/{id}", function(){
    return "Delete a Product";
});


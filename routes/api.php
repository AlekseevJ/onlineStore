<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WetherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// посомтреть товары, добавить товар в корзину


Route::middleware('auth')->group(function(){


    Route::get('/start',function(){return'gello';});
    Route::get('/product',[ProductController::class,'index']);
    Route::post('/product',[ProductController::class,'index']);
    Route::post('/product/store',[ProductController::class,'store']);
    Route::post('/product/update',[ProductController::class,'update']);
    Route::post('/product/destroy',[ProductController::class,'destroy']);

    Route::get('/getwet',[WetherController::class,'get']);
});
Route::post('/register',[UserController::class,'create']);



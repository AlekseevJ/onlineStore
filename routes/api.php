<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WetherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::middleware('auth')->group(function(){
    Route::prefix('product')->group(function(){
         Route::get('/',[ProductController::class,'index'])->withoutMiddleware(['auth']);
         Route::post('/',[ProductController::class,'store']);
         Route::put('/',[ProductController::class,'update']);
         Route::delete('/',[ProductController::class,'destroy']);
    });
    Route::prefix('basket')->group(function(){
    Route::post('/add', [CartController::class, 'add']);
    Route::get('/showmybasket',[CartController::class,'showmybasket']);
    Route::post('/pay',[CartController::class,'pay']);
    Route::get('/showhistory',[CartController::class,'showhistory']);
    });
    Route::get('/getwet',[WetherController::class,'get']);
});
Route::post('/register',[UserController::class,'create']);
Route::post('/token', [UserController::class,'token']);




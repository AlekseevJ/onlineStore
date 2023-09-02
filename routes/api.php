<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// посомтреть товары, добавить товар в корзину


Route::middleware('auth')->group(function(){


    Route::get('/start',function(){return'gello';});
});
Route::post('/register',[UserController::class,'create']);



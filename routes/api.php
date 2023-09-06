<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WetherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


// посомтреть товары, добавить товар в корзину


Route::middleware('auth')->group(function(){


    
    Route::get('/product',[ProductController::class,'index']);
    Route::post('/product',[ProductController::class,'index']);
    Route::post('/product/store',[ProductController::class,'store']);
    Route::post('/product/update',[ProductController::class,'update']);
    Route::post('/product/destroy',[ProductController::class,'destroy']);

    Route::get('/getwet',[WetherController::class,'get']);

    Route::post('/add', [CartController::class, 'add']);
});
Route::get('/start',function(){return'Существующие маршруты <br> get(/product - получить все товары<br>
    post(/product получить все товары по пост<br>
    post(/product/store, добавить новый товар, через тело передать product name , price , color можно desc<br>
    post(/product/update обновить сущность таблицы товаров, передать через тело id Товара и новые значения, color отношение через id color выбрать<br>
    post(/product/destroy Удалить продукт по id <br>
    post(/register зарегистрировать нового пользователя , нужны name, email, password , выдаст токен. Токен передавать в query,header или теле с ключом token <br>
    get(/getwet запросить апишку яндекс погоды и получить ответ<br>
    post /token передать через форму логин пароль name password выдаст token';});
Route::post('/token', [UserController::class,'token']);
Route::get('/repoi',[ProductController::class,'repoindex']);



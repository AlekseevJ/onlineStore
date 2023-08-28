<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Item;

class BasketController extends Controller
{
    public function basket(){
        
        $basketId = session('basketId');
        if(!is_null($basketId)){
            $basket = Basket::findOrFail($basketId);
        }
        if(empty($basket)){
            $basket = null;
        }
        return view('basket.index', compact('basket'));
    }
    public function basketadd($id){
        $basketId = session('basketId');
       
        if(is_null($basketId)){
            $basket = Basket::create();
            
            session(['basketId'=>$basket->id]);
        } else{
            $basket = Basket::find($basketId);
        }
       
        $basket->items()->attach($id);

        return redirect()->route('basket');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use App\Models\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add(Request $request)
    {
       $tok = !empty($request->input('token')) ? $request->input('token') : $request->header('token'); 
       $tok = Token::where('token_api',$tok)->first()  ;  // ->user()->get('id'); // id mb
       $us = $tok->user;
       if(!empty($us->cart_id)){ dd(1);
        $us->update(['cart_id'=> Cart::create(),]);
       }
       $produ = Product::find($request->input('id'));
      
      $cart = $us;//->products()->attach($produ);//->products()->attach($produ);
      dd($cart);
      $an = $cart->products();
      dd($an);

    }
    public function showmybasket()
    {
        //
    }

}

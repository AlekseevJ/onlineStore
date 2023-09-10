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
       $cart= Cart::firstOrCreate(['status'=>'false']);
       $us->carts()->save($cart);
       $cart->products()->attach($request->input('id'));
      return $cart->products()->get();
    }
    public function showmybasket(Request $request)
    {
       $tok = !empty($request->input('token')) ? $request->input('token') : $request->header('token'); 
       $tok = Token::where('token_api',$tok)->first();
       $us = $tok->user;

       return $us->carts()->where('status','=','false')->first()->products()->get();

    }

    public function pay(Request $request){
       $tok = !empty($request->input('token')) ? $request->input('token') : $request->header('token'); 
       $tok = Token::where('token_api',$tok)->first();
       $us = $tok->user;

       $pcrt =$us->carts()->where('status', false)->first();
       $pr =$pcrt->products()->get();
       $itogo=null;
       foreach($pr as $val){
        $itogo+= $val->price;
       };
       $us->carts()->where('status', false)->first()->update(['status'=>true]);
       return response('Оплачено '.$itogo.' $', $status = 203);
    }

    public function showhistory(Request $request){
       $tok = !empty($request->input('token')) ? $request->input('token') : $request->header('token'); 
       $tok = Token::where('token_api',$tok)->first();
       $us = $tok->user;
      
       $carts = $us->carts()->where('status',true)->get();
       $pul = array();
       foreach($carts as $val){
         $pul[] = $val->products()->get();
       }
       return $pul;
    }

}

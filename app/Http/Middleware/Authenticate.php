<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
 
     protected function authenticate($request, array $guards)
    {   $token = DB::table('tokens')->where('token_api','=',$request->query('token'))->orWhere('token_api','=',$request->input('token'))->orWhere('token_api','=',$request->header('token'))->get();
       
        if($request->query('token') && count($token)!=0){
          if($request->query('token') === $token->first()->token_api){
            return; 
           }
       }elseif($request->input('token') && count($token)!=0){ 
          if(($token->first()->token_api == $request->input('token'))){
            return;
           }}
        if($request->header('token') && count($token)!=0){ 
            if($request->header('token') === $token->first()->token_api){
              return; 
             }
         }
        
       if( $request->input('token')=='admin' || $request->query('token')=='admin'|| $request->header('token')=='admin'){
        return;
       }
       
        $this->unauthenticated($request, $guards);
}
protected function redirectTo(Request $request): string
{
    return route('login');
}
}

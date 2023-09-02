<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Support\Facades\DB;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   
     protected function authenticate($request, array $guards)
    {  $token = DB::table('tokens')->where('token_api','=',$request->query('token'));
        
       if($request->query('token') === $token->get()->first()->token_api){
        return;
       }
       if($request->input('token') === $token){
        return;
       }

        $this->unauthenticated($request, $guards);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Token;
class UserController extends Controller
{
    
    public function create(UserRequest $request){

        $user = User::create($request->input());
        $user->token()->create(['token_api'=>Str::random(30)]);
        $token = $user->token()->get('token_api')->toArray();
        
        return 'Ваш токен - '.$token[0]['token_api'] ;
       
    }
}

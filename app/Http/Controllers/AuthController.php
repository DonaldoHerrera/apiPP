<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response(1);
            
        }else{
            return response(0);
        }
    }

    public function register(Request $request){
        $request['password'] = bcrypt($request['password']); 
        $user = new User;
        return response()->json($user->store($request->all())); 
    }
}

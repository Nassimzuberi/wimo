<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        $details = $request->only('email','password');

        if (Auth::attempt($details)){
            return response()->json(['message' => 'success' , 'data' => User::with('commandes','seller')->where('email',$details['email'])->first()]);
        } else{
            return response()->json(['message' => 'Mot de passe ou identifiant incorrect','code' => 501]);
        }
    }
}

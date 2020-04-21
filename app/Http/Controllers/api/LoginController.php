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
            $user = User::where('email',$details['email'])->first();
            return response()->json(['message' => 'success' , 'data' => ['api_token' => $user->api_token , 'id' => $user->id]]);
        } else{
            return response()->json(['message' => 'Mot de passe ou identifiant incorrect','code' => 501]);
        }
    }
}

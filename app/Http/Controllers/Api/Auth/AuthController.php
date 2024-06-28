<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Response\Message;
use Illuminate\Http\Request;
use App\Functions\GlobalFunction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $username=$request->username;
        $password=$request->password;
        
        $login=User::with('role')->where('username',$username)->get()->first();

        if (! $login || ! Hash::check($password, $login->password)) {
            return GlobalFunction::denied(Message::LOGIN_FAILED);
        }

        $token = $login->createToken('myapptoken')->plainTextToken;
        $cookie = cookie('authcookie',$token);

        return response()->json([
            'message' => 'Successfully Logged In',
            'token' => $token,
            'data' => $login ,
            
        ], 200)->withCookie($cookie);
        
    }

    public function Logout(Request $request){
        
        auth('sanctum')->user()->currentAccessToken()->delete();
        return GlobalFunction::denied(Message::LOGOUT_USER);

    }

  
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Hash;
use App\Models\User;

class AuthenticateController extends Controller
{
    public function index()
    {
        return "Hello world ";
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('pseudo', 'password');
        $user = User::where('pseudo', '=', $credentials['pseudo'])->first();

        try{
            if(Hash::check($credentials['password'], $user->password)){
                $token = JWTAuth::fromUser($user);
            }else{
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }catch (JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        return response()->json(compact('token'));
    }

}

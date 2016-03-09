<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends Controller
{
    public function index()
    {
        return "Hello world ";
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('pseudo', 'password');

        try{
            // verify the credentials
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e){
            //return response()->json(['error' => 'could_not_create_token'], 500);
            return pouet;
        }

        // get the token
        return response()->json(compact('token'));
    }

}

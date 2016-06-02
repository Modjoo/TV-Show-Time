<?php

namespace App\Http\Controllers;

use Hash;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
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

        try {
            if ($user != null && Hash::check($credentials['password'], $user->password)) {
                $token = JWTAuth::fromUser($user);
            } else {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));

    }
    
    public function getAuthenticatedUser()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (JWTException $e) {
            var_dump($e);
            return response()->json(['token_expired'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }


    /**
     * Retrive the authenticate user.
     * @return null
     */
    public static function getAuthUser()
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            return null;
        } catch (TokenInvalidException $e) {
            return null;
        } catch (JWTException $e) {
            return null;
        }

        if($user != null){
            $user = User::where('pseudo', '=', $user->pseudo)->first();
        }

        return $user;
    }

}

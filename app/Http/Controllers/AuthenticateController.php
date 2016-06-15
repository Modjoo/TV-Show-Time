<?php

namespace App\Http\Controllers;

use Hash;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mockery\CountValidator\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

/**
 * This controller sets a user's authentication logic.
 * This will be use by JWTAuth
 * Class AuthenticateController
 * @package App\Http\Controllers
 */
class AuthenticateController extends Controller
{

    /**
     * Authenticate the user.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('pseudo', 'password');
		
		// Retrieve the user
		$user = User::where('pseudo', '=', $credentials['pseudo'])->first();

        try {
            // Check the user and its password
            if ($user != null && Hash::check($credentials['password'], $user->password)) {
                // Generate the token.
                $token = JWTAuth::fromUser($user);
            } else {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));

    }

    /**
     * Check if the user is authenticated and if his token is still valid.
     * @return \Illuminate\Http\JsonResponse
     */
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
     * Return the authenticated user if it exists
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
            $user->password = null;
        }

        return $user;
    }


    /**
     * Create new user
     * @throws Exception
     */
    public function signUp(){
        // Get data from the form
        $pseudo = Input::get('pseudo');
        $password = Input::get('password');
        $birthday = Input::get('birthday');
        $gender = Input::get('gender');

        // Test if the chosen pseudo is not already taken
        if(User::where('pseudo', '=', $pseudo)->first() != null){
            throw new Exception("please change your user name");
        }
        else
        {
            // Create new user
            try{
                $params = ['pseudo' => $pseudo, 'password' => Hash::make($password), 'birthday' => $birthday, 'gender' => $gender];
                User::create($params);
            }catch (Exception $exception){
                throw new Exception("user data invalid");
            }
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Services\JsonService;
use App\Models\User;
use App\Http\Services\DataBaseService;
use App\Http\Utils\Utils;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    private $dbservice;


    public function __construct()
    {
        $this->dbservice = new DataBaseService();
    }

    public function getSubscriptions(){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }
        return json_encode(["series" => $this->dbservice->getSubscriptions($user->id)]);
    }


    public function setPersonnalData(){
        $pseudo = Input::get('pseudo');
        $avatar = Input::get('avatar_img');
        $birthday = Input::get('birthday');
        $gender = Input::get('gender');

        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        $user = User::find($user->id);
        $user->update(['pseudo' => $pseudo, 'avatar_img' => $avatar, 'birthday' => Utils::convertDate($birthday), 'gender' => $gender]);
    }
    
    public function getPersonnalData(){
        $user = AuthenticateController::getAuthUser();
        return JsonService::generateUser($user);
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Http\Services\JsonService;
use App\Models\User;
use App\Http\Services\DataBaseService;
use App\Http\Utils\Utils;
use App\Http\Requests;

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


    public function setPersonnalData($json){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        $data = \GuzzleHttp\json_decode($json);
        $user = User::find($user->id);
        $user->update(['pseudo' => $data->pseudo, 'avatar_img' => $data->avatar, 'birthday' => Utils::convertDate($data->birthday), 'gender' => $data->gender]);
    }
    
    public function getPersonnalData(){
        $user = AuthenticateController::getAuthUser();
        return JsonService::generateUser($user);
    }
    
}

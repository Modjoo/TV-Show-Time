<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\User;
use App\Models\UsersSeries;
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

        $usersSeries = UsersSeries::where("user_id", "=", $user->id)->get();
        $series[] = array();
        $i = 0;
        foreach ($usersSeries as $usersSerie) {
            $series[$i] = Series::find($usersSerie->serie_id);
            $i++;
        }
        return json_encode(["series" => $series]);
    }

    public function setPersonnalData($id){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        $json = '{"pseudo":"Manu","avatar":"http://images.cryhavok.org/d/17176-1/Evil+Genius+Racoon.jpg","birthday":"19-04-2016","gender":"Homme"}';
        $data = \GuzzleHttp\json_decode($json);
        $user = User::find(1);
        $user->update(['pseudo' => $data->pseudo, 'avatar_img' => $data->avatar, 'birthday' => Utils::convertDate($data->birthday), 'gender' => $data->gender]);
    }
}

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

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->dbservice = new DataBaseService();
    }

    /**
     * Get the series followed by the current user
     * @return null|string
     */
    public function getSubscriptions(){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        return JsonService::generateSeries($this->dbservice->getSubscriptions($user->id));
    }


    /**
     * Update personal data of the current user
     * @return null
     */
    public function setPersonalData(){
        // Get data from form
        $pseudo = Input::get('pseudo');
        $avatar = Input::get('avatar_img');
        $birthday = Input::get('birthday');
        $gender = Input::get('gender');

        // Get authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        // Update data in the database
        $user = User::find($user->id);
        $user->update(['pseudo' => $pseudo, 'avatar_img' => $avatar, 'birthday' => Utils::convertDate($birthday), 'gender' => $gender]);
    }

    /**
     * Get personal data to fill
     * @return array
     */
    public function getPersonalData(){
        $user = AuthenticateController::getAuthUser();
        return JsonService::generateUser($user);
    }
    
}

<?php
/**
 * Created by PhpStorm.
 * User: Theo.ZIMMERMANN
 * Date: 07.06.2016
 * Time: 13:46
 */

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\User;
use App\Models\UsersSeries;
use App\Http\Services\DataBaseService;

use App\Http\Requests;

class CalendarController extends Controller
{
    private $dbservice;


    public function __construct()
    {
        $this->dbservice = new DataBaseService();
    }

    public function getSubscriptions(){
        // TODO : implement session system (or other) to manage the user id in the webapp
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

}

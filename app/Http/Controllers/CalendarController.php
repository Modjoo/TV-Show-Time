<?php
/**
 * Created by PhpStorm.
 * User: Theo.ZIMMERMANN
 * Date: 07.06.2016
 * Time: 13:46
 */

namespace App\Http\Controllers;

use App\Http\Services\JsonService;
use App\Models\Episode;
use App\Models\Season;
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

    public function getCalendarSubs()
    {
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        $subscriptions = UsersSeries::where(['user_id' => $user->id])->get();

        $episodes = Episode::whereRaw('release_date between NOW() AND DATE_ADD(NOW(), INTERVAL 1 YEAR)')->where(function($query) use ($subscriptions){
            foreach ($subscriptions as $subscription){
                $query->orWhere(["serie_id" => $subscription->serie_id]);
            }
        })->get();


        foreach ($episodes as $episode){
            $episode->season_id = Season::where("id", "=", $episode->season_id)->pluck("number");
        }


        return JsonService::generateSubscription($episodes);

    }

}

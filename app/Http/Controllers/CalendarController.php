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

    public function getCalendarSubs()
    {
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        $subscriptions = \App\Models\UsersSeries::where(['user_id' => $user->id])->get();

        $episodes = \App\Models\Episode::whereRaw('release_date between NOW() AND DATE_ADD(NOW(), INTERVAL 1 YEAR)')->where(function($query) use ($subscriptions){
            foreach ($subscriptions as $subscription){
                $query->orWhere(["serie_id" => $subscription->serie_id]);
            }
        })->get();

        return \App\Http\Services\JsonService::generateEpisodes($episodes);

    }

}

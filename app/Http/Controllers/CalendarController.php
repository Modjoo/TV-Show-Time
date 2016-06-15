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
use Carbon\Carbon;
use App\Http\Requests;

class CalendarController extends Controller
{
    private $dbservice;

    /**
     * CalendarController constructor.
     */
    public function __construct()
    {
        $this->dbservice = new DataBaseService();
    }

    /**
     * Get the unreleased episodes from the series followed by the user
     * @return null|string
     */
    public function getCalendarSubs()
    {
        // Get the authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null) {
            return null;
        }

        $subscriptions = UsersSeries::where(['user_id' => $user->id])->get();

        $seriesID = [];
        foreach($subscriptions as $subscription)
        {
            array_push($seriesID, $subscription->serie_id);
        }

        $episodes = Episode::whereBetween('release_date', [Carbon::now(), Carbon::now()->addYear()])->whereIn('serie_id', $seriesID)->get();

        // Add the season number information
        foreach ($episodes as $episode) {
            $episode->season_id = Season::where("id", "=", $episode->season_id)->pluck("number");
        }

        return JsonService::generateSubscription($episodes);
    }
}

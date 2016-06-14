<?php

namespace App\Http\Controllers;

use App\Http\Services\DataBaseService;
use App\Http\Services\JsonService;
use App\Models\Episode;
use App\Models\EpisodesUser;
use App\Models\Season;
use App\Models\Series;
use App\Models\UsersSeries;
use Illuminate\Http\Request;

use App\Http\Requests;

class ToWatchController extends Controller
{

    /**
     * Get the not seen episodes by the user from the series that he follows
     * @return null|string
     */
    public function getToWatch()
    {
        // Get the authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null) {
            return null;
        }


        $series = Series::with(['seasons', 'seasons.episodes' => function($query) use ($user){
            $query->whereRaw('release_date between "0000-01-01 00:00:00" AND  NOW()')->whereNotIn('id', EpisodesUser::where('user_id', '=', $user->id)->pluck("episode_id"));
        }])->whereIn('id', UsersSeries::where("user_id", "=", $user->id)->pluck("serie_id"))->get();


        // Logic to apply is empty? on a serie, season or episode
        foreach ($series as $serie){
            $serieIsEmpty = true;
            foreach ($serie->seasons as $season){
                $seasonIsEmpty = true;
                if(sizeof($season->episodes) == 0 && $serieIsEmpty){
                    $serieIsEmpty = true;
                }
                if(sizeof($season->episodes) >= 1){
                    $serieIsEmpty = false;
                    $seasonIsEmpty = false;
                }
                $season->isEmpty = $seasonIsEmpty;
            }
            $serie->isEmpty = $serieIsEmpty;
        }


        return JsonService::generateSeries($series);
    }
}

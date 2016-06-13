<?php

namespace App\Http\Controllers;

use App\Http\Services\DataBaseService;
use App\Models\Episode;
use App\Models\EpisodesUser;
use App\Models\Season;
use App\Models\Series;
use App\Models\UsersSeries;
use Illuminate\Http\Request;

use App\Http\Requests;

class ToWatchController extends Controller
{

    public function getToWatch()
    {
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null) {
            return null;
        }

        $series = Series::with(['seasons', 'seasons.episodes' => function($query) use ($user){
            $query->whereRaw('release_date between "0000-01-01 00:00:00" AND  NOW()')->whereNotIn('id', EpisodesUser::where('user_id', '=', $user->id)->pluck("episode_id"));
        }])->whereIn('id', UsersSeries::where("user_id", "=", $user->id)->pluck("serie_id"))->get();

        // Logic to apply is empty? on a serie / season / episode
        // For example if a season contains no episode wich means is empty == true
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

        return json_encode(["series" => $series]);
    }
}

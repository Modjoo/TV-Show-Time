<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\EpisodesUser;
use App\Models\UsersSeries;
use Illuminate\Http\Request;

use App\Http\Requests;

class ToWatchController extends Controller
{

    public function getToWatchEpisodes()
    {
        // Get user

        $episodesIds = Episode::
            whereIn('serie_id', UsersSeries::where("user_id", "=", 1)->pluck("serie_id"))
            ->whereNotIn('id', EpisodesUser::where('user_id', '=', 1)->pluck("episode_id"));
        // get all episodes from the series => Episodes


        dd($episodesIds->get());
        // compare episodes seen with episodes available => prevent list + EpisodesUsers

        // get episodes missing
    }
}

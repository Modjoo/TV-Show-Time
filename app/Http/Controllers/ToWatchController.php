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
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        $episodes = Episode::whereIn('serie_id', UsersSeries::where("user_id", "=", $user->id)->pluck("serie_id"))
            ->whereNotIn('id', EpisodesUser::where('user_id', '=', $user->id)->pluck("episode_id"));

        return json_encode(["episodes" => $episodes->get()]);
    }


}

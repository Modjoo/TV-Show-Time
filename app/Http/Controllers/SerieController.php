<?php

namespace App\Http\Controllers;

use App\Http\Services\DataBaseService;
use App\Http\Services\JsonService;
use App\Http\Services\SearchService;
use App\Models\EpisodesUser;
use App\Models\Series;
use App\Models\Episode;
use App\Models\UsersSeries;


use App\Http\Requests;
use App\Http\Utils;

class SerieController extends Controller
{
    private $extservice;
    private $dbservice;


    public function __construct()
    {
        $this->extservice = new SearchService();
        $this->dbservice = new DataBaseService();
    }

    public function searchSerie($string){
        return JsonService::generateSeries($this->extservice->searchSeriesByName($string));
    }

    public function getSerie($idSerie){
        return json_encode(["serie" => Series::where("id", "=", $idSerie)->get()]);
    }

    public function getEpisode($idEpisode){
        return json_encode(["episode" => Episode::where("id", "=", $idEpisode)->get()]);
    }

    public function subscribe($idSerie){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }
        UsersSeries::firstOrCreate(["user_id" => $user->id, "serie_id" => $idSerie]);
    }
    
    public function isSubscribed($idSerie){
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }
        $subscribe = UsersSeries::where(["user_id" => $user->id, "serie_id" => $idSerie])->first();
        return json_encode(["subscribe" => $subscribe != null]);
    }

    public function unsubscribe($idSerie){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }
        UsersSeries::where(["serie_id" => $idSerie, "user_id" => $user->id])->get()->first()->delete();
    }

    public function getSeenEpisodes($idSeason){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        return json_encode(["episodes" => $this->dbservice->getSeenEpisodes($user->id, $idSeason)]);
    }

    public function seenEpisode($idEpisode, $seen){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }
        $params = ['user_id' => $user->id, 'episode_id' => $idEpisode];
        if($seen == 'true'){
            EpisodesUser::firstOrCreate($params);
        }else{
            $episodeUser = EpisodesUser::where($params)->first();
            if($episodeUser){
                $episodeUser->delete();
            }
        }
    }
    
    public function getFilledSerie($idSerie){
        $seasonArray = [];
        $serie = \App\Models\Series::find($idSerie);
        if($serie == null){
            return "";
        }
        $seasons = $this->dbservice->findOrcreateSeasons($serie, $serie->external_id);
        foreach ($seasons as $season){
            $seasonArray[] = JsonService::parseSeason($season, $season->episodes()->get());
        }
        return JsonService::generateSerieSeason($serie, $seasonArray);
    }    
}

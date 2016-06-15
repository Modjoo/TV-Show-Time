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
use Psy\Util\Json;

class SerieController extends Controller
{
    private $extservice;
    private $dbservice;


    /**
     * SerieController constructor.
     */
    public function __construct()
    {
        $this->extservice = new SearchService();
        $this->dbservice = new DataBaseService();
    }

    /**
     * Research a serie from the external api
     * @param $string
     * @return string
     */
    public function searchSerie($string){
        return JsonService::generateSeries($this->extservice->searchSeriesByName($string));
    }

    /**
     * Get a serie to display its data
     * @param $idSerie
     * @return string
     */
    public function getSerie($idSerie){
        return JsonService::generateSingleSerie(Series::where("id", "=", $idSerie)->get());
    }

    /**
     * TO IMPLEMENT : get episode info to display it in an episode view
     * @param $idEpisode
     * @return string
     */
    public function getEpisode($idEpisode){
        return JsonService::generateFullEpisode(Episode::where("id", "=", $idEpisode)->get());
    }

    /**
     * Subscribe to the given serie
     * @param $idSerie
     * @return null
     */
    public function subscribe($idSerie){
        // Get the authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        UsersSeries::firstOrCreate(["user_id" => $user->id, "serie_id" => $idSerie]);
    }

    /**
     * Return if the user follows the given serie or not
     * @param $idSerie
     * @return null|string
     */
    public function isSubscribed($idSerie){
        // Get the authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        return JsonService::generateIsSubscribedSerie(UsersSeries::where(["user_id" => $user->id, "serie_id" => $idSerie])->first() != null);
    }

    /**
     * Unsubscribe to the given serie
     * @param $idSerie
     * @return null
     */
    public function unsubscribe($idSerie){
        // Get the authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        UsersSeries::where(["serie_id" => $idSerie, "user_id" => $user->id])->get()->first()->delete();
    }

    /**
     * Get all episodes the user saw
     * @param $idSeason
     * @return null|string
     */
    public function getSeenEpisodes($idSeason){
        // Get the authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        return json_encode(["episodes" => $this->dbservice->getSeenEpisodes($user->id, $idSeason)]);
    }

    /**
     * Update database when the user interacts with the episode saw or not
     * @param $idEpisode
     * @param $seen
     * @return null
     */
    public function seenEpisode($idEpisode, $seen){
        // Get the authenticated user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        // Test if the user chose saw the given episode or not
        $params = ['user_id' => $user->id, 'episode_id' => $idEpisode];
        if($seen == 'true'){
            EpisodesUser::firstOrCreate($params);
        } else{
            $episodeUser = EpisodesUser::where($params)->first();
            if($episodeUser){
                $episodeUser->delete();
            }
        }
    }

    /**
     * Get the full given serie
     * @param $idSerie
     * @return string
     */
    public function getFilledSerie($idSerie){
        $seasonArray = [];
        $serie = Series::find($idSerie);
        if($serie == null){
            return "";
        }

        $seasons = $this->dbservice->findOrCreateSeasons($serie, $serie->external_id);

        // Generate the seasons info with its episodes
        foreach ($seasons as $season){
            $seasonArray[] = JsonService::parseSeason($season, $season->episodes()->get());
        }

        return JsonService::generateSerieSeason($serie, $seasonArray);
    }    
}

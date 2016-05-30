<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 24.05.2016
 * Time: 13:58
 */

namespace App\Http\Services;


use App\Http\Utils\JsonParser;
use App\Http\Utils\Omdb;

class DataBaseService
{
    private $externalAPI;

    /**
     * DataBaseService constructor.
     * @param Omdb $externalAPI
     */
    public function __construct()
    {
        $this->externalAPI = new Omdb();
    }


    public function findOrCreateSeriesFromExternalId($externalSeriesID){
        $serie = JsonParser::parseSerie($this->externalAPI->searchSerieById($externalSeriesID));
        $seasons = [];
        $numberOfSeason = $this->externalAPI->getSeasonAmount($externalSeriesID);

        for($i = 1; $i < $numberOfSeason; $i++){
            $rawSeason = $this->externalAPI->getInfoSeason($externalSeriesID, $i);
            $season = JsonParser::parseSeason($rawSeason);
            $episodes = $this->extractEpisodeFromSeason($rawSeason, false);

            // Add season object to array
            $seasons[] = array(["season" => $season, "episodes"  => $episodes]);
        }

        // --- SAVE --- //
        $serie->save();
        foreach($seasons as $season){
            $season[0]["season"]->series()->associate($serie);
            $season[0]["season"]->save();
            foreach ($season[0]["episodes"] as $episode){
                $episode->season()->associate($season[0]["season"]);
                $episode->save();
            }
        }

    }


    /**
     * @param $seasonJson
     * @param $fill query the api for fill the episode with complete data.
     * @return array
     */
    private function extractEpisodeFromSeason($seasonJson, $fill){
        $listEpisode = [];
        $rawEpisodes = $seasonJson->Episodes;
        foreach ($rawEpisodes as $rawEpisode){
            if($fill){
                $rawEpisode = $this->externalAPI->searchEpisodeById($rawEpisode->imdbID);
            }
            $episode = JsonParser::parseEpisode($rawEpisode);
            $episode->isfilled = $fill;
            $listEpisode[] = $episode;
        }
        return $listEpisode;
    }
}
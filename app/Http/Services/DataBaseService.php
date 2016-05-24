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
        $serieRawJson = $this->externalAPI->searchSerieById($externalSeriesID);
        $seasons = [];
        // Simulation : 8
        //$numberOfSeason = $externalAPI->getSeasonAmount($externalSeriesID);
        $numberOfSeason = 8;

        for($i = 1; $i <= $numberOfSeason; $i++){
            $rawSeason = $this->externalAPI->getInfoSeason($externalSeriesID, $i);
            $this->extractEpisodeFromSeason($rawSeason);
            dd($rawSeason);
        }

        dd("pouet");
    }


    private function extractEpisodeFromSeason($seasonJson){
        $listEpisode = [];
        $rawEpisodes = $seasonJson->Episodes;
        foreach ($rawEpisodes as $rawEpisode){
            $ep = JsonParser::parseEpisode($this->externalAPI->searchEpisodeById($rawEpisode->imdbID));
            $listEpisode[] = $ep;
        }
        return $listEpisode;
    }
}
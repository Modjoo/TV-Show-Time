<?php

/**
 * Created by PhpStorm.
 * User: Emmanuel.BARCHICHAT
 * Date: 17.05.2016
 * Time: 14:46
 */

namespace App\Http\Services;

use \App\Http\Utils\Omdb;
use \App\Http\Utils\JsonParser;

class SearchService
{
    private $omdb;

    /**
     * SearchService constructor.
     */
    public function __construct()
    {
        $this->omdb = new Omdb();
    }

    /**
     * Get season info with its episodes
     * @param $externalSerieId
     * @param $seasonNumber
     * @return \App\Models\Season
     */
    public function getSeason($externalSerieId, $seasonNumber)
    {
        $json = $this->omdb->getInfoSeason($externalSerieId, $seasonNumber);
        return JsonParser::parseSeason($json);
    }

    /**
     * Get episode full info from the api
     * @param $externalId
     * @return \App\Models\Episode
     */
    public function getEpisode($externalId)
    {
        $json = $this->omdb->searchEpisodeById($externalId);
        return JsonParser::parseEpisode($json);
    }

    /**
     * Get serie from the external api
     * @param $externalId
     * @return \App\Models\Series
     */
    public function getSerie($externalId)
    {
        $json = $this->omdb->searchSerieById($externalId);
        return JsonParser::parseSerie($json);
    }

    /**
     * Get series matching a given string
     * @param $string
     * @return array
     */
    public function searchSeriesByName($string)
    {
        $dataBaseService = new DataBaseService();
        $series = [];

        $rawSeries = $this->omdb->searchBySeriesName($string);
        if($rawSeries == null){
            return $series;
        }
        foreach($rawSeries->Search as $serie){
            $series[] = $dataBaseService->findOrCreateSeriesFromExternalId($serie->imdbID);
        }
        return $series;
    }


}
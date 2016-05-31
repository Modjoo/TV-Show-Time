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

    public function getEpisode($externalId)
    {
        $json = $this->omdb->searchEpisodeById($externalId);
        return JsonParser::parseEpisode($json);
    }

    public function getSeason($externalSerieId, $seasonNumber)
    {
        $json = $this->omdb->getInfoSeason($externalSerieId, $seasonNumber);
        return JsonParser::parseSeason($json);
    }

    public function getSerie($externalId)
    {
        $json = $this->omdb->searchSerieById($externalId);
        return JsonParser::parseSerie($json);
    }

    public function searchSeriesByName($string)
    {
        $dataBaseService = new DataBaseService();
        $series = [];

        $rawSeries = $this->omdb->searchBySeriesName($string);
        foreach($rawSeries->Search as $serie){
            $series[] = $dataBaseService->findOrCreateSeriesFromExternalId($serie->imdbID);
        }

        dd($series);

        return null;
    }


}
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
    public function getEpisode($externalId){
        $json = Omdb::searchEpisodeById($externalId);
        return JsonParser::parseEpisode($json);
    }

    public function getSeason($externalSerieId, $seasonNumber){
        $json = Omdb::getInfoSeason($externalSerieId, $seasonNumber);
        return JsonParser::parseSeason($json);
    }

    public function getSerie($externalId){
        $json = Omdb::searchSerieById($externalId);
        return JsonParser::parseSerie($json);
    }

    public function searchSeriesByName($string){
        return Omdb::searchBySeriesName($string);
    }



}
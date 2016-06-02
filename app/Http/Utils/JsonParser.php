<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 17.05.2016
 * Time: 14:29
 */

namespace App\Http\Utils;


use App\Contracts\IJsonParser;
use App\Exceptions\InvalidJsonException;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Http\Utils;

class JsonParser implements IJsonParser
{


    public static function parseEpisode($json){
        $map = self::mapEpisode($json);
        return new Episode($map);
    }

    public static function parseSerie($json){
        if(!self::isValid($json)){
            throwException(new InvalidJsonException("Invalid json exception"));
        }
        $array = self::mapSerie($json);
        return new Series($array);
    }

    public static function parseSeason($json){
        $map = self::mapSeason($json);
        return new Season($map);
    }

    // TODO - implement parseSeriesList function when we search from a string.
    public static function parseSeriesList($json){

    }

    public static function isValid($json)
    {
        return $json->Response == "True";
    }


    /**
     * Extract Genre from json and convert them to array
     * @param $json
     * return array of genre name
     */
    public static function parseGenres($json){
        $wordList = preg_split('/,/', $json->Genre, 0, PREG_SPLIT_NO_EMPTY);
        
        for($i = 0; $i < sizeof($wordList); $i++){
            $wordList[$i] = trim($wordList[$i]);
        }

        return $wordList;
    }


    /**
     * Map the json with the serie attributes
     * @param $json Only one serie response from the api
     * @return array return mapped array
     */
    private static function mapSerie($json){
        $map = [
            "title" => $json->Title,
            "synopsis" => $json->Plot,
            "cover_img_url" => $json->Poster,
            "actors" => $json->Actors,
            "producer" => $json->Writer,
            "external_id" => $json->imdbID,
            "duration_pattern" => Utils\Utils::extractNumber($json->Runtime),
        ];
        return $map;
    }
    
    private static function mapEpisode($json){
        if(property_exists($json, 'Runtime')){
            $map = [
                "title" => $json->Title,
                "duration" => Utils\Utils::extractNumber($json->Runtime),
                "description" => $json->Plot,
                "number" => Utils\Utils::extractNumber($json->Episode),
                "release_date" => Utils\Utils::convertDate($json->Released),
                "cover_img_url" => $json->Poster,
                "external_id" => $json->imdbID,
                "isfilled" => true
            ];
        }else{
            $map = [
                "title" => $json->Title,
                "number" => Utils\Utils::extractNumber($json->Episode),
                "external_id" => $json->imdbID,
                "isfilled" => false
            ];
        }

        return $map;
    }

    private static function mapSeason($json){
        $map = [
            "title" => $json->Title,
            "number" => Utils\Utils::extractNumber($json->Season),
        ];
        return $map;
    }

}
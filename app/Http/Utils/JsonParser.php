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

    public static function isValid($json)
    {
        return $json->Response == "True";
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
        $map = [
            "title" => $json->Title,
            "duration" => Utils\Utils::extractNumber($json->Runtime),
            "description" => $json->Plot,
            "number" => Utils\Utils::extractNumber($json->Episode),
            "release_date" => Utils\Utils::convertDate($json->Released),
            "cover_img_url" => $json->Poster,
            "external_id" => $json->imdbID,
        ];
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
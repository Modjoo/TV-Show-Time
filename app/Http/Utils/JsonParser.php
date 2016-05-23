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
use App\Models\Season;
use App\Models\Series;

class JsonParser implements IJsonParser
{


    public static function parseEpisode($json){
        
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
            "duration_pattern" => self::extractNumber($json->Runtime),
        ];
        return $map;
    }
    
    private static function mapEpisode($json){
        $map = [

        ];
        return $map;
    }

    private static function mapSeason($json){
        $map = [
            "title" => $json->Title,
            "number" => self::extractNumber($json->Season),
        ];
        return $map;
    }

    private static function extractNumber($string){
        $duration = 0;
        preg_match("/[0-9]+/", $string, $matches);
        if(sizeof($matches) == 1){
            $duration = intval($matches[0]);
        }
        return $duration;
    }


}
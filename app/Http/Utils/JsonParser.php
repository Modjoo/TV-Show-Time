<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 17.05.2016
 * Time: 14:29
 */

namespace App\Http\Utils;


use App\Contracts\IJsonParser;

class JsonParser implements IJsonParser
{


    public function parseEpisode($json){

    }

    public function parseSerie($json){

    }

    public function parseSeason($json){

    }

    public static function isValid($json)
    {
        return $json->Response == "True";
    }


}
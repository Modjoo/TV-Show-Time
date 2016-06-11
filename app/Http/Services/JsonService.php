<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 30.05.2016
 * Time: 15:17
 */

namespace App\Http\Services;


class JsonService
{

    public static function generateSeries($series){
        return json_encode(["series" => $series]);
    }

    public static function generateSerieSeason($serie, $seasons){
        return json_encode(["serie" => $serie, "seasons" => $seasons]);
    }

    public static function generateEpisodes($episodes){
        return json_encode(["episode" => $episodes]);
    }

    public static function generateSubscription($episodes){
        return json_encode(["subscription" => $episodes]);
    }

    public static function parseSeason($season, $episodeList){
        return ["season" => $season, "episodes" => $episodeList];
    }

    public static function generateUser($user){
        return ["user" => $user];
    }

}
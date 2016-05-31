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

    public function generateSerieSeason($serie, $seasons){
        return json_encode(["serie" => $serie, "seasons" => $seasons]);
    }

    public function generateEpisodes($episodes){
        return json_encode(["episode" => $episodes]);
    }

}
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

    public static function generateSingleSerie($serie){
        return json_encode(["serie" => $serie]);
    }

    public static function generateSerieSeason($serie, $seasons){
        return json_encode(["serie" => $serie, "seasons" => $seasons]);
    }

    public static function generateFullEpisode($episode){
        return json_encode(["episode" => $episode]);
    }

    public static function generateEpisodes($episodes){
        return json_encode(["episode" => $episodes]);
    }

    public static function generateSubscription($seasons){
        return json_encode(["subscription" => $seasons]);
    }

    public static function parseSeason($season, $episodeList){
        return ["season" => $season, "episodes" => $episodeList];
    }

    public static function generateUser($user){
        return ["user" => $user];
    }

    public static function generateFavouritesSeries($series){
        return json_encode(["favouritesSeries" => $series]);
    }

    public static function generateFeaturedSeries($series){
        return json_encode(["featuredSeries" => $series]);
    }

    public static function generateIsSubscribedSerie($isSubscribed){
        return json_encode(["subscribe" => $isSubscribed]);
    }

}
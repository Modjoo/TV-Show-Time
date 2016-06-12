<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 24.05.2016
 * Time: 13:58
 */

namespace App\Http\Services;


use App\Http\Utils\JsonParser;
use App\Http\Utils\Omdb;
use App\Models\Genre;
use App\Models\GenresSeries;
use App\Models\Series;
use App\Models\UsersSeries;
use App\Models\EpisodesUser;
use App\Models\Episode;

class DataBaseService
{
    private $externalAPI;

    /**
     * DataBaseService constructor.
     * @param Omdb $externalAPI
     */
    public function __construct()
    {
        $this->externalAPI = new Omdb();
    }


    public function findOrCreateSeriesFromExternalId($externalSeriesID)
    {
        $serie = Series::where("external_id", "=", $externalSeriesID)->get();

        if (sizeof($serie) == 1) {
            return $serie[0];
        } else {
            $rawJsonSerie = $this->externalAPI->searchSerieById($externalSeriesID);
            $serie = JsonParser::parseSerie($rawJsonSerie);
            $genres = JsonParser::parseGenres($rawJsonSerie);
            $serie->isfilled = false;
            $serie->save();
            $this->linkGenre($serie, $genres);
        }
        return $serie;
    }


    public function findOrcreateSeasons($serie, $externalID)
    {
        // Check if seasons exists
        $seasons = $serie->seasons()->get();
        $episodes = null;

        if (sizeof($seasons) <= 0) {
            $numberOfSeason = $this->externalAPI->getSeasonAmount($externalID);
            for ($i = 1; $i <= $numberOfSeason; $i++) {
                $rawSeason = $this->externalAPI->getInfoSeason($externalID, $i);
                if($rawSeason != null){
                    $season = JsonParser::parseSeason($rawSeason);
                    $season->series()->associate($serie);
                    $season->save();
                    $this->createFullEpisode($serie, $season, $rawSeason->Episodes);
                    $seasons[] = $season;
                }
            }
        }
        return $seasons;
    }

    /**
     * @param $season {Season}
     * @param $externalID {String}
     */
    public function createFullEpisode($serie, $season, $rawEpisodes = null)
    {
        $episodes = [];
        if ($rawEpisodes == null) {
            $rawEpisodes = $this->externalAPI->getInfoSeason($serie->external_id, $serie->number);
        }
        $rawEpisodes = $this->extractEpisodeFromSeason($rawEpisodes, true);

        foreach ($rawEpisodes as $episode) {
            $episode->season()->associate($season);
            $episode->serie_id = $serie->id;
            $episode->save();
            $episodes[] = $episode;
        }
        return $episodes;
    }


    /**
     * @param $seasonJson
     * @param $fill query the api for fill the episode with complete data.
     * @return array
     */
    private function extractEpisodeFromSeason($rawEpisodes, $fill)
    {
        $listEpisode = [];
        foreach ($rawEpisodes as $rawEpisode) {
            if ($fill) {
                $rawEpisode = $this->externalAPI->searchEpisodeById($rawEpisode->imdbID);
            }
            $episode = JsonParser::parseEpisode($rawEpisode);
            $episode->isfilled = $fill;
            $listEpisode[] = $episode;
        }
        return $listEpisode;
    }


    /**
     *
     * @param $serie one serie object with pk
     * @param $genres array of genres (list of string)
     */
    private function linkGenre($serie, $genres)
    {
        foreach ($genres as $genre) {
            $g = Genre::firstOrCreate(["name" => $genre]);
            GenresSeries::firstOrCreate(["serie_id" => $serie->id, "genre_id" => $g->id]);
        }
    }

    public function getSubscriptions($idUser)
    {
        $usersSeries = UsersSeries::where("user_id", "=", $idUser)->get();
        $series[] = array();
        $i = 0;
        foreach ($usersSeries as $usersSerie) {
            $series[$i] = Series::find($usersSerie->serie_id);
            $i++;
        }
        return $series;

    }

    public function getSeenEpisodes($idUser, $idSeason){
        return Episode::whereIn('id', EpisodesUser::where('user_id', '=', $idUser)->pluck("episode_id"))
            ->where('season_id', '=', $idSeason)->get();
    }

    public function getFeaturedSeries()
    {
        return \App\Models\Series::featured();
    }

    public function getFavouritesSeries($idUser)
    {
        return Series::whereIn('id', UsersSeries::where('user_id', '=', $idUser)->pluck("serie_id"))
            ->take(10)->get();
    }
}
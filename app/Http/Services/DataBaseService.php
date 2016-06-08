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


    public function createSeasons($serie, $externalID){
        $seasons = [];

        $numberOfSeason = $this->externalAPI->getSeasonAmount($externalID);

        for ($i = 1; $i < $numberOfSeason; $i++) {
            $rawSeason = $this->externalAPI->getInfoSeason($externalID, $i);
            $season = JsonParser::parseSeason($rawSeason);
            $episodes = $this->extractEpisodeFromSeason($rawSeason, false);

            // Add season object to array
            $seasons[] = array(["season" => $season, "episodes" => $episodes]);
        }

        foreach ($seasons as $season) {
            $season[0]["season"]->series()->associate($serie);
            $season[0]["season"]->save();
            foreach ($season[0]["episodes"] as $episode) {
                $episode->season()->associate($season[0]["season"]);
                $episode->save();
            }
        }
    }

    /**
     * @param $season {Season}
     * @param $externalID {String}
     */
    public function createFullEpisode($season, $externalID){
        $numberOfSeason = $season->number();

        $rawSeason = $this->externalAPI->getInfoSeason($externalID, $numberOfSeason);
        $season = JsonParser::parseSeason($rawSeason);
        $episodes = $this->extractEpisodeFromSeason($rawSeason, true);
        foreach ($episodes as $episode) {
            $episode->season()->associate($season);
            $episode->save();
        }
    }


    /**
     * @param $seasonJson
     * @param $fill query the api for fill the episode with complete data.
     * @return array
     */
    private function extractEpisodeFromSeason($seasonJson, $fill)
    {
        $listEpisode = [];
        $rawEpisodes = $seasonJson->Episodes;
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

    public function getSubscriptions($userid){
        $usersSeries = UsersSeries::where("user_id", "=", $userid)->get();
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

    // TODO : implement getFeaturedSeries function to get the last 10 series on the database
    public function getFeaturedSeries()
    {
        return \App\Models\Series::featured();
    }

    // TODO : implement getFavouritesSeries function to get the first 10 series from a user
    public function getFavouritesSeries($iduser)
    {

    }
}
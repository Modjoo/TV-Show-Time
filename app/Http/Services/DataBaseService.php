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
use App\Models\Episode;
use App\Models\EpisodesUser;
use App\Models\Genre;
use App\Models\GenresSeries;
use App\Models\Series;
use App\Models\UsersSeries;

class DataBaseService
{
    private $externalAPI;

    /**
     * DataBaseService constructor.
     */
    public function __construct()
    {
        $this->externalAPI = new Omdb();
    }


    /**
     * Get the serie from an external id and add it to the database if it is missing
     * @param $externalSeriesID
     * @return Series
     */
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

    /**
     * Link the serie to its categories
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

    /**
     * Get the seasons from the serie external id and add it to the database if it is missing
     * @param $serie
     * @param $externalID
     * @return array
     */
    public function findOrCreateSeasons($serie, $externalID)
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
     * Add to the database the episodes of a given season
     * @param $serie
     * @param $season
     * @param null $rawEpisodes
     * @return array
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
     * Extract episodes from a season in the external api
     * @param $rawEpisodes
     * @param $fill
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
     * Get the series followed by the given user
     * @param $idUser
     * @return mixed
     */
    public function getSubscriptions($idUser)
    {
        return Series::whereIn('id', UsersSeries::where("user_id", "=", $idUser)->pluck('serie_id'))->get();
    }

    /**
     * Get the episodes seen by the given user
     * @param $idUser
     * @param $idSeason
     * @return mixed
     */
    public function getSeenEpisodes($idUser, $idSeason){
        return Episode::whereIn('id', EpisodesUser::where('user_id', '=', $idUser)->pluck("episode_id"))
            ->where('season_id', '=', $idSeason)->get();
    }

    /**
     * Get the featured series from the database
     * @return mixed
     */
    public function getFeaturedSeries()
    {
        return Series::featured();
    }

    /**
     * Get the favourites series from a given user
     * @param $idUser
     * @return mixed
     */
    public function getFavouritesSeries($idUser)
    {
        return Series::whereIn('id', UsersSeries::where('user_id', '=', $idUser)->pluck("serie_id"))
            ->take(10)->get();
    }

}
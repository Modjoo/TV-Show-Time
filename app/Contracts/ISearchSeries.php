<?php

namespace App\Contracts;

/**
 * Interface use for request the movie api.
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 10.05.2016
 * Time: 14:02
 */
interface ISearchSeries
{
    /**
     * Search a serie by string
     * @param $string
     * @return mixed
     */
    public function searchBySeriesName($string);

    /**
     * @param $idSerie
     * @return mixed
     */
    public function searchSerieById($idSerie);

    /**
     * @param $idEpisod
     * @return mixed
     */
    public function searchEpisodeById($idEpisod);

    /**
     * Function with several http requests due to missing data
     * @param $idSerie
     * @return number of the seasons in the serie
     */
    public function getSeasonAmount($idSerie);

    /**
     * Retrieve episods from season number
     * @param $idSerie
     * @param $seasonNumber
     * @return mixed
     */
    public function getInfoSeason($id, $saeasonNumber);

}
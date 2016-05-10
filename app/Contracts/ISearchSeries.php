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
     * Gives a film list corresponding to research
     * @param $name
     * @return mixed
     */
    public function searchByName($name);

    /**
     * Retrieve full information for the corresponding id
     * @param $id
     * @return mixed
     */
    public function searchById($id);

    /**
     * List all saison with the series id
     * @param $id
     * @return mixed
     */
    public function listSaison($id);

    /**
     * Retrive all saison information 
     * @param $id -> Series id
     * @param $saisonNumber -> Saison number
     * @return mixed
     */
    public function getInfoSaison($id, $saisonNumber);

}
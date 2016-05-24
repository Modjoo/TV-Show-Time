<?php

/**
 * Created by PhpStorm.
 * User: Emmanuel.BARCHICHAT
 * Date: 17.05.2016
 * Time: 14:46
 */

namespace App\Http\Services;

use \App\Http\Utils\Omdb;
use \App\Models;
class SqlRequestService
{
    public function getFullSerie($id){

    }

    public function getSeasonsFromSerie($idSerie){
        $seasons = Models\Season::where('serie_id', '=', $idSerie)->get();
        foreach ($seasons as $season){
            $season->episodes();
        }

    }

    public function getEpisodesFromSeason($idSeason){
        return Models\Episode::where('season_id', '=', $idSeason);
    }




}
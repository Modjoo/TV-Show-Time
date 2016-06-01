<?php

namespace App\Http\Controllers;

use App\Http\Services\DataBaseService;
use App\Http\Services\JsonService;
use App\Http\Services\SearchService;
use App\Models\Series;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Utils;

class SerieController extends Controller
{
    private $extservice;
    private $dbservice;


    public function __construct()
    {
        $this->extservice = new SearchService();
        $this->dbservice = new DataBaseService();
    }

    public function searchSerie($string){
        return JsonService::generateSeries($this->extservice->searchSeriesByName($string));
    }

    public function getSerie($idSerie){
        return json_encode(["serie" => Series::where("id", "=", $idSerie)->get()]);
    }

    public function getEpisode($idEpisode){
        return json_encode(["episode" => Episode::where("id", "=", $idEpisode)->get()]);
    }

    public function subscribe(){

    }

    public function unsubscribe(){

    }
}

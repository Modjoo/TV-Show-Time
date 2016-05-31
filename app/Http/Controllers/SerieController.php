<?php

namespace App\Http\Controllers;

use App\Http\Services\SearchService;
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
        //$this->dbservice = new DataBaseService();
    }

    public function searchSerie($string){
        return $this->extservice->searchSeriesByName($string);
    }

    public function getSerie($idserie){

    }

    public function getEpisode(){

    }

    public function subscribe(){

    }

    public function unsubscribe(){

    }
}

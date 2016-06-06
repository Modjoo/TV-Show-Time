<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Services\DataBaseService;

class HomeController extends Controller
{
    private $dbservice;

    /**
     * HomeController constructor.
     * @param $dbs
     */
    public function __construct()
    {
        $this->dbservice = new DataBaseService();
    }


    public function getFeaturedSeries(){
        $featuredSeries = $this->dbservice->getFeaturedSeries();
        return json_encode(["featuredseries" => $featuredSeries]);       
    }


    public function getFavouritesSeries(){
        $idUser = 1;
        $favouritesSeries = $this->dbservice->getFavouritesSeries($idUser);
        return json_encode(["favouritesSeries" => $favouritesSeries]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\SearchService;
use App\Http\Requests;
use App\Http\Services\DataBaseService;
use App\Models\Series;

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
        $favouritesSeries = $this->dbservice->getFeaturedSeries();
        return json_encode(["favouritesSeries" => $favouritesSeries]);
    }


}

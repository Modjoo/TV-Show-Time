<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Services\DataBaseService;
use App\Http\Services\JsonService;

class HomeController extends Controller
{
    private $dbservice;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->dbservice = new DataBaseService();
    }

    /**
     * Get the featured series for the home page
     * @return string
     */
    public function getFeaturedSeries(){
        return JsonService::generateFeaturedSeries($this->dbservice->getFeaturedSeries());
    }

    /**
     * Get the favourites series of the authenticated user
     * @return null|string
     */
    public function getFavouritesSeries(){
        // Get user
        $user = AuthenticateController::getAuthUser();
        if ($user == null){
            return null;
        }

        return JsonService::generateFavouritesSeries($this->dbservice->getFavouritesSeries($user->id));
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp;

class OmdbController extends Controller
{

    public function getTest(){
        return 'prout';
    }

    public function getJsonomdb(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://www.omdbapi.com/?s=*nes&type=series');
        echo $res->getBody();

        return "json";
    }


}


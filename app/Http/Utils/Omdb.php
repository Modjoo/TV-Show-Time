<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 10.05.2016
 * Time: 14:41
 */

namespace App\Http\Utils;


use App\Contracts\ISearchSeries;
use GuzzleHttp\Client;

// TODO: Create query manager for add params and check.
class Omdb implements ISearchSeries
{
    private $request = null;
    private static $DEFAULT_URL = 'http://www.omdbapi.com/?';

    /**
     * Omdb constructor.
     * @param null $client
     */
    public function __construct()
    {
        $this->request = new Client();
    }
    
    public function searchByName($name)
    {
        $query = self::$DEFAULT_URL + '*' + $name + '*';
        $this->requestAPI($query);
    }

    public function searchById($id)
    {
        $query = self::$DEFAULT_URL + 't=' + $id;
        $this->requestAPI($query);
    }

    //http://www.omdbapi.com/?i=tt0944947&plot=full
    public function listSaison($id)
    {
        $query = self::$DEFAULT_URL + 'i=' + $id + '&plot=full';
        $this->requestAPI($query);
    }

    public function getInfoSaison($id, $saisonNumber)
    {
        $query = self::$DEFAULT_URL + 'i=' + $id + '&Season=' + $saisonNumber + '&plot=full';
        $this->requestAPI($query);
    }

    private function requestAPI($query){
        $res = $this->request->get($query);
        return $res->getBody();
    }


}
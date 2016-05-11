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
use GuzzleHttp;

class Omdb implements ISearchSeries
{
    private $request = null;
    private static $DEFAULT_URL = 'http://www.omdbapi.com';

    /**
     * Omdb constructor.
     * @param null $client
     */
    public function __construct()
    {
        $this->request = new Client();
    }

    public function searchBySeriesName($name)
    {
        $params = array('s' => $name.'*', 'type' => 'series');
        return $this->requestAPI($this->generateQuery($params));
    }

    public function searchBySeriesId($id)
    {
        $params = array('i' => $id);
        return $this->requestAPI($this->generateQuery($params));
    }

    public function searchByEpisodeId($id)
    {
        $params = array('i' => $id);
        return $this->requestAPI($this->generateQuery($params));
    }

    //http://www.omdbapi.com/?i=tt0944947&plot=full
    public function listSaison($id)
    {
        $params = array('i' => $id, 'plot' => 'full');
        return $this->requestAPI($this->generateQuery($params));
    }

    public function getInfoSaison($id, $saisonNumber)
    {
        $params = array('i' => $id, 'Season' => $saisonNumber, 'plot' => 'full');
        return $this->requestAPI($this->generateQuery($params));
    }

    private function requestAPI($query)
    {
        $res = $this->request->get($query);
        return json_decode($res->getBody()->getContents());
    }

    /**
     * @param $params May be an array or object containing properties.
     * @return string Full url
     */
    private function generateQuery($params)
    {
        return self::$DEFAULT_URL . '?' . http_build_query($params);
    }


}
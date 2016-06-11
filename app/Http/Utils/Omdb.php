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
    const RESPONSE_FALSE = "False";

    /**
     * Omdb constructor.
     * @param null $client
     */
    public function __construct()
    {
        $this->request = new Client();
    }


    public function searchBySeriesName($string)
    {
        $params = array('s' => $string . '*', 'type' => 'series');
        return $this->requestAPI($this->generateQuery($params));
    }


    public function searchSerieById($id)
    {
        $params = array('i' => $id);
        return $this->requestAPI($this->generateQuery($params));
    }


    public function searchEpisodeById($idEpisod)
    {
        $params = array('i' => $idEpisod);
        return $this->requestAPI($this->generateQuery($params));
    }


    public function getSeasonAmount($idSerie)
    {
        $json = $this->getInfoSeason($idSerie, 1);
        if (JsonParser::isValid($json)) {
            return intval($json->totalSeasons);
        } else {
            return 0;
        }
    }

    public function getInfoSeason($idSerie, $seasonNumber)
    {
        $params = array('i' => $idSerie, 'Season' => $seasonNumber, 'plot' => 'full');
        return $this->requestAPI($this->generateQuery($params));
    }

    /**
     * Send request http to the omdb api
     * @param $query
     * @return mixed
     */
    private function requestAPI($query)
    {
        $res = $this->request->get($query);
        $json = json_decode($res->getBody()->getContents());
        if ($json->Response == self::RESPONSE_FALSE) {
            return null;
        }
        return $json;
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
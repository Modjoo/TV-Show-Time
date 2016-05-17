<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 17.05.2016
 * Time: 14:52
 */

namespace App\Contracts;


interface IJsonParser
{
    public static function parseEpisode($json);

    public static function parseSerie($json);

    public static function parseSeason($json);

    /**
     * Check if the json doesn't contain error.
     * @param $json Json object
     * @return boolean true if the response is not false.
     */
    public static function isValid($json);

}
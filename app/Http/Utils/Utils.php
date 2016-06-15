<?php
/**
 * Created by PhpStorm.
 * User: Christophe.KALMAN
 * Date: 23.05.2016
 * Time: 14:48
 */

namespace App\Http\Utils;


class Utils
{
    /**
     * Extract a number of a string value
     * @param $string
     * @return int
     */
    public static function extractNumber($string){
        $duration = 0;
        preg_match("/[0-9]+/", $string, $matches);
        if(sizeof($matches) == 1){
            $duration = intval($matches[0]);
        }
        return $duration;
    }

    /**
     * Convert a date to a valuable format
     * @param $string
     * @return bool|string
     */
    public static function convertDate($string){
        $timestamp = strtotime($string);
        return date("Y-m-d H:i:s", $timestamp);
    }
}
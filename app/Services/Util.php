<?php namespace App\Services;

class Util
{
    static $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRTSUVWXYZ';
    static $numbers = '0123456789';
    static $specialCharacters = '-_@#$%&*';

    static function getArrayFromString($string) {
        return str_split($string, 1);
    }

    static function generateName($quantity = 1) {
        $array = self::getArrayFromString(self::$letters);
        $arrayResult = $array[array_rand($array, $quantity)];
        $data = array();
        foreach($arrayResult as $i) {
            $data[] = $array[$i];
        }
        return implode('', $data);
    }
}
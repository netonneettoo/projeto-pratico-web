<?php namespace App\Services;

class Util
{
    const LETTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRTSUVWXYZ';

    public static function getArrayFromString($string) {
        return str_split($string, 1);
    }

    public static function generateName($quantity) {
        $array = self::getArrayFromString(self::LETTERS);
        $arrayResult = $array[array_rand($array, $quantity)];
        $data = array();
        foreach($arrayResult as $i) {
            $data[] = $array[$i];
        }
        $implode = implode('', $data);
        return $implode;
    }
}
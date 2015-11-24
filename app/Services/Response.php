<?php
/**
 * Created by IntelliJ IDEA.
 * User: waltercatskillet
 * Date: 11/20/15
 * Time: 10:13
 */

namespace App\Services;

class Response {

    const CODE_SUCCESS = 200;
    const CODE_ERROR = 500;

    public function __construct() {
        //
    }

    private static function getJson($msg, $data, $code) {
        if ($data == null || @count($data) == 0) {
            $array = ['code' => $code, 'message' => $msg];
        } else {
            $array = ['code' => $code, 'message' => $msg, 'data_count' => @count($data), 'data' => $data];
        }
        return response()->json($array, $code);
    }

    public static function jsonSuccess($msg, $data = null, $code = null) {
        if ($code == null) {
            $code = self::CODE_SUCCESS;
        }
        return self::getJson($msg, $data, $code);
    }

    public static function jsonError($msg, $data = null, $code = null) {
        if ($code == null) {
            $code = self::CODE_ERROR;
        }
        return self::getJson($msg, $data, $code);
    }

}
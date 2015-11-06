<?php namespace App\Services;


abstract class AbstractService
{
    const ERROR_CODE = 422;

    public static function jsonReturn($code, $message, $data = null) {
        return [
            'code'       => $code,
            'message'    => $message,
            'count_data' => count($data),
            'data'       => $data
        ];
    }
}
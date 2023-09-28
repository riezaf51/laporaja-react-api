<?php

namespace App\Helpers;

class ApiFormatter {
    protected static $response = [
        'code' => null,
        'data' => null,
        'total' => null,
    ];

    public static function createApi($code = null, $data = null, $total = null){
        self::$response['code'] = $code;
        self::$response['data'] = $data;
        self::$response['total'] = $total;

        return response()->json(self::$response,self::$response['code']);
    }
}
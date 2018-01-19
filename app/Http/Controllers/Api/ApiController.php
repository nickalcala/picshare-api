<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    
    public static $HTTP_SUCCESS = 200;
    public static $HTTP_UNAUTHORIZED = 401;
    public static $HTTP_UNPROCESSABLE = 422;
    public static $HTTP_ERROR = 500;

    public function success($data)
    {
        return \Response::json([
            'data' => $data,
            'http_code' => static::$HTTP_SUCCESS
        ]);
    }

    public function unauthorized($message = 'Unauthorized')
    {
        return \Response::json([
            'message' => $message,
            'http_code' => static::$HTTP_UNAUTHORIZED
        ], static::$HTTP_UNAUTHORIZED);
    }

    public function unprocessable($messages = [])
    {
        return \Response::json([
            'messages' => $messages,
            'http_code' => static::$HTTP_UNPROCESSABLE
        ], static::$HTTP_UNPROCESSABLE);
    }

    public function error($message = 'Internal Server Error', $errCode = 0)
    {
        return \Response::json([
            'message' => $message,
            'error_code' => $errCode,
            'http_code' => static::$HTTP_ERROR
        ], static::$HTTP_ERROR);
    }
}
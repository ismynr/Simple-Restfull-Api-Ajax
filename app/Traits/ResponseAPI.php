<?php 

namespace App\Traits;

trait ResponseAPI
{
    public function response($message, $data, $statusCode, $error)
    {
        if(!$message){
            return response()->json(['message' => 'Message is required'], 500);
        }

        return response()->json([
            'message' => $message,
            'error' => $error,
            'code' => $statusCode,
            'results' => $data,
        ], $statusCode);
    }

    public function errorResponse($message, $statusCode){
        return $this->response($message, null, $statusCode, true);
    }

    public function successResponse($message, $data){
        return $this->response($message, $data, 200, false);
    }
}


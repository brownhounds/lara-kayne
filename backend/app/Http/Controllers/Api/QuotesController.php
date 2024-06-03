<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use \Illuminate\Http\Client\Response;

class QuotesController
{
    public function get() {
        $apiResponse = Http::get(Config::get('api.clients.kanyerestapi'));

        if(!$apiResponse->successful()) {
            return response([
                'status' => 500,
                'message' => 'Internal Server Error'
            ], 500);
        }

        return response()->json($this->getRandom($apiResponse));
    }

    private function getRandom(Response $apiResponse): array {
        $indexes = array_rand((array)$apiResponse->object(), 5);

        $response = [];

        foreach($indexes as $index) {
            array_push($response, $apiResponse[$index]);
        }

        return $response;
    }
}

<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuotesController
{
    private $isCacheHit = true;

    /**
     * @return JsonResponse
     */
    public function get(): JsonResponse {
        $response = Cache::remember(Config::get('api.cache.key'), Config::get('api.cache.ttl'), function() {
            $apiResponse = Http::get(Config::get('api.clients.kanyerestapi'));

            if (!$apiResponse->successful()) {
                throw new HttpResponseException(response()->json([
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ], 500));
            }

            $this->isCacheHit = false;
            return $apiResponse->object();
        });

        return response()
            ->json($this->getRandom($response))
            ->header('X-Cache', $this->isCacheHit ? 'HIT' : 'MISS');
    }

    /**
     * @param array $response
     * @return array
     */
    private function getRandom(array $response): array {
        $indexes = array_rand($response, 5);
        return array_map(fn($index) => $response[$index], $indexes);
    }
}

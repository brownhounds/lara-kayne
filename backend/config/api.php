<?php

return [
    'token' => env('API_BEARER_TOKEN'),
    'clients' => [
        'kanyerestapi' => env('API_KANYE_REST'),
    ],
    'cache' => [
        'key' => env('API_CACHE_KEY'),
        'ttl' => env('API_CACHE_TTL')
    ],
];

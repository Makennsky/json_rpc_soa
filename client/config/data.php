<?php

return [
    'base_url'     => env('SOA_DATA', 'http://127.0.0.1:8000/'),
    'rpc_endpoint' => env('JSON_RPC_ENDPOINT','api/rpc/point'),
    'rpc_type'     => env('JSON_RPC_TYPE', '2.0'),
    'methods'      => [
        'store' => 'data@store',
        'get'   => 'data@get'
    ]
];

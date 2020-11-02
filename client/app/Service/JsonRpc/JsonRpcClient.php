<?php

namespace App\Service\JsonRpc;

use Carbon\Carbon;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Class JsonRpcClient
 * @package App\Service\JsonRpc
 */
class JsonRpcClient
{
    /**
     * @var Repository|Application|mixed
     */
    protected $baseUri;

    /**
     * @var PendingRequest
     */
    protected $client;

    /**
     * JsonRpcClient constructor.
     */
    public function __construct()
    {
        $this->baseUri = config('data.base_url');
        $this->client  = Http
            ::withHeaders(
                [
                    'Content-Type' => 'application/json'
                ]
            )
        ;
    }

    /**
     * @param string $method
     * @param array $params
     * @param $path
     * @return array
     */
    public function request(string $method, array $params, $path): array
    {
        $response = $this->client->post(
            $this->baseUri . $path,
            [
                'jsonrpc' => config('data.rpc_type'),
                'id'      => Carbon::now()->timestamp,
                'method'  => $method,
                'params'  => $params
            ]
        )
        ;

        return json_decode($response->body(), true);
    }

}

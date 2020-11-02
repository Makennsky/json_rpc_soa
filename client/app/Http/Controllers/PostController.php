<?php

namespace App\Http\Controllers;

use App\Service\JsonRpc\JsonRpcClient;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @var JsonRpcClient
     */
    protected $client;

    /**
     * @var Repository|Application|mixed
     */
    protected $endpoint;

    /**
     * PostController constructor.
     * @param JsonRpcClient $client
     */
    public function __construct(JsonRpcClient $client)
    {
        $this->endpoint = config('data.rpc_endpoint');
        $this->client = $client;
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('widgets.post');
    }

    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        return view('widgets.show_post');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function store(Request $request)
    {
        $method   = config('data.methods.store');
        $response = $this
            ->client
            ->request(
                $method,
                $request->all(),
                $this->endpoint
            )
        ;
        $errors = data_get($response, 'error.data');
        if ($errors) {
            return redirect()->back()->withErrors($errors);
        }
        return view('widgets.post', [
            'response' => data_get($response, 'result')
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function get(Request $request)
    {
        $method   = config('data.methods.get');
        $response = $this
            ->client
            ->request(
                $method,
                $request->all(),
                $this->endpoint
            )
        ;
        $errors = data_get($response, 'error.data');
        if ($errors) {
            return redirect()->back()->withErrors($errors);
        }
        return view('widgets.show_post', [
            'response' => data_get($response, 'result')
        ]);
    }
}

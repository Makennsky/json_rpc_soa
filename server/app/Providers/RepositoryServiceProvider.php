<?php


namespace App\Providers;


use App\Domain\Repositories\DataRepositoryInterface;
use App\Domain\Repositories\Eloquent\DataRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            DataRepositoryInterface::class,
            DataRepositoryEloquent::class
        );
    }
}

<?php

namespace App\Providers;

use App\Service\Grpc\ConfigurableClientFactory;
use App\Service\Grpc\Contracts\ClientFactory;
use App\Service\Grpc\Contracts\ErrorHandler;
use App\Service\Grpc\LaravelErrorHandler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientFactory::class, ConfigurableClientFactory::class);
        $this->app->bind(ErrorHandler::class, LaravelErrorHandler::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

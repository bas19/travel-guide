<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ForecastServiceInterface;
use App\Services\ForecastService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ForecastServiceInterface::class, ForecastService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

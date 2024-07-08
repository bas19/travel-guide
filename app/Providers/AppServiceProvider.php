<?php

namespace App\Providers;

use App\Interfaces\ForecastServiceInterface;
use App\Interfaces\VenueServiceInterface;
use App\Services\ForecastService;
use App\Services\VenueService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ForecastServiceInterface::class, ForecastService::class);
        $this->app->singleton(VenueServiceInterface::class, VenueService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

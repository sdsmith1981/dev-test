<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the CatApiService as a singleton
        $this->app->singleton(\App\Contracts\PetApiInterface::class, function ($app) {
            return new \App\Services\CatApiService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('search', function (Request $request) {
            return Limit::perMinute(60)->by($request->ip());
        });
    }
}

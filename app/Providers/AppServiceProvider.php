<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\Services\Auth\LoginServiceInterface',
            'App\Services\Auth\LoginService'
        );

        $this->app->bind(
            'App\Interfaces\Services\Auth\LogoutServiceInterface',
            'App\Services\Auth\LogoutService'
        );
        
        $this->app->bind(
            'App\Interfaces\Services\Auth\RefreshTokenServiceInterface',
            'App\Services\Auth\RefreshTokenService'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

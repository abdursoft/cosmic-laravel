<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::viaRemember();
        config(['session.lifetime' => 60 * 24 * 365]);

        if (!request()->cookie('purchase_session')) {
        Cookie::queue(
            'purchase_session',
            bin2hex(random_bytes(16)),
            525600 // minutes (1 year)
        );
    }
    }
}

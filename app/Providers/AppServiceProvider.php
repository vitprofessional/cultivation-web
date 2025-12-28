<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS URLs when the configured app URL uses https
        $scheme = parse_url(config('app.url'), PHP_URL_SCHEME);
        if ($scheme === 'https') {
            URL::forceScheme('https');
        }
    }
}

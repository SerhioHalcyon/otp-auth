<?php

namespace Empat\Otp;

use Illuminate\Support\ServiceProvider;

class OtpServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('Otp', function () {
            $provider = config('otp.default');
            
            return $this->app->make(config("otp.providers.{$provider}.provider"));
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/otp.php', 'otp'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/otp.php' => config_path('otp.php'),
        ], 'otp-config');
    }
}

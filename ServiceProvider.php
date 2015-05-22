<?php

namespace Arrilot\Api;

use Illuminate\Console\AppNamespaceDetectorTrait;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    use AppNamespaceDetectorTrait;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'laravel-api-generator'
        );
//
//        $this->app->singleton('command.api.make', function ($app) {
//            return new ApiMakeCommand($app['files']);
//        });

        $this->commands('command.api.make');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('laravel-api-generator.php'),
        ]);

        include app_path(config('routes_file'));
    }
}

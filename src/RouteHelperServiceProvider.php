<?php

namespace Drsoft28\RouteHelper;

use Illuminate\Support\ServiceProvider;

class RouteHelperServiceProvider extends ServiceProvider {
    public function register() {
        // Bind RouteParameterDefaults as a singleton in the service container
        $this->app->singleton('route.defaults', function () {
            return new RouteParameterDefaults();
        });

        // Include helper functions
        require_once __DIR__ . '/helpers.php';
    }

    public function boot() {
        // Perform any package-specific boot logic here
    }
}

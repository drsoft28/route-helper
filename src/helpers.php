<?php

use Drsoft28\RouteHelper\RouteParameterDefaults;

/**
 * Helper to access the RouteParameterDefaults instance.
 *
 * @return RouteParameterDefaults
 */
function route_defaults(): RouteParameterDefaults {
    return app('route.defaults');
}

if (!function_exists('routeWithDefault')) {

 /**
     * Generate the URL to a named route.
     *
     * @param  string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
function routeWithDefault(string $name, array $parameters = [], $absolute = true): string {
    return route_defaults()->route($name, $parameters,$absolute);
}


 }
 
if (!function_exists('to_routeWithDefault')) {
    /**
     * Create a new redirect response to a named route.
     *
     * @param  string  $route
     * @param  mixed  $parameters
     * @param  int  $status
     * @param  array  $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    function to_routeWithDefault($route, $parameters = [], $status = 302, $headers = [])
     {
        app('RouteParameterDefaults')->to_route($name, $parameters , $status, $headers);
     }
 
 }

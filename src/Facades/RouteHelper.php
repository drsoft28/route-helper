<?php

namespace Drsoft28\RouteHelper\Facades;

use Illuminate\Support\Facades\Facade;

class RouteHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'route.defaults'; // This is the key used to resolve the instance in the service container
    }
}

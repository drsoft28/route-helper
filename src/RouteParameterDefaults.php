<?php

namespace Drsoft28\RouteHelper;

use Exception;

class RouteParameterDefaults {
    private $list = [];

    public function __construct() {
        $this->list = [];
    }

    /**
     * Set a default value for a route parameter.
     *
     * @param  string  $key   The name of the parameter.
     * @param  mixed   $value The default value to assign.
     * @return void
     */
    public function set(string $key, mixed $value): void {
        $this->list[$key] = $value;
        request()->attributes->set($key, $value);
    }
 
    /**
     * Check if paramter name exist or not.
     *
     * @param  string  $key The name of the parameter.
     * @return bool
     *
     */
    public function has(string $key): bool {
        return array_key_exists($key, $this->list);
    }
    /**
     * Get the default value for a route parameter.
     *
     * @param  string  $key The name of the parameter.
     * @return mixed
     * @throws Exception If the parameter does not exist.
     */
    public function get(string $key): mixed {
        if ($this->has($key, $this->list)) {
            return $this->list[$key];
        }

        throw new Exception("Key $key does not exist.");
    }
    /**
     * Get the default value for a route parameter.
     *
     * @param  string  $key The name of the parameter.
     * @param bool If true, unset value from request.
     */
    public function remove($key,bool $delete_attribute=true){
        if($this->has($key)){
            unset($this->list[$key]);
        // Remove a specific attribute by key
        if ($delete_attribute) {
        $request->attributes->remove($key);
        }
        }
    }
    private function updateParameters($name,$parameters){
        $local_parameters =[...$parameters];
           // Get the route instance by its name
           $route = \Illuminate\Support\Facades\Route::getRoutes()->getByName($name);
           if($route){
           // Get the route's parameter names
           $route_parameters = $route ? $route->parameterNames() : [];
               foreach($route_parameters as $key){
                   // Check if the parameter is already passed in the parameters
                   if($this->has($key)){
                       // If the key exists in the request, add it to the parameters
                       $local_parameters[$key] = $this->get($key);
                        
                    }
               }
            }  
        return $local_parameters;
    } 
     /**
     * Generate the URL to a named route.
     *
     * @param  string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function route($name, $parameters = [], $absolute = true)
    {
     
        $params = $this->updateParameters($name,$parameters);
        // Generate and return the route URL
        return route($name,$params,$absolute = true);
    }
    

    /**
     * Create a new redirect response to a named route.
     *
     * @param  string  $route
     * @param  mixed  $parameters
     * @param  int  $status
     * @param  array  $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    function to_route($route, $parameters = [], $status = 302, $headers = [])
    {
        $params = $this->updateParameters($name,$parameters);
        return redirect()->route($route, $params, $status, $headers);
    }
}
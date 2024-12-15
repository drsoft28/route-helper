# Route Helper Package

This package simplifies the use of default parameters for Laravel routes. It allows you to define default values for route parameters, automatically fill them when generating URLs, and provides helper functions for route generation and redirection.

## Features

- Set and retrieve default route parameter values.
- Automatically include default parameters when generating URLs or redirecting to routes.
- Provides helper functions for route handling.

## Installation

1. Install the package using Composer:

   ```bash
   composer require drsoft/route-helper
   ```

2. Add the service provider to your `config/app.php` file (if not automatically registered):

   ```php
   'providers' => [
       Drsoft28\RouteHelper\RouteHelperServiceProvider::class,
   ],
   ```

3. Publish the configuration (optional):

   ```bash
   php artisan vendor:publish --provider="Drsoft28\\RouteHelper\\RouteHelperServiceProvider"
   ```

## Usage

### Setting Default Route Parameters

Use the `route_defaults` helper to set default values for route parameters:

```php
route_defaults()->set('slug', 'default-slug');
```

### Generating Routes with Default Parameters

Use the `routeWithDefault` function to generate a route URL:

```php
$url = routeWithDefault('vendor.home');
```
If the parameter `slug` is not provided, it will use the default value set earlier.

### Redirecting to Routes with Default Parameters

Use the `to_routeWithDefault` function for redirection:

```php
return to_routeWithDefault('vendor.home');
```

### Accessing Default Parameter Values

Retrieve a parameter's default value:

```php
$slug = route_defaults()->get('slug');
```

### Removing Default Parameter Values

Remove a default parameter value:

```php
route_defaults()->remove('slug');
```

### Example Scenario

1. Set a default value for `slug`:

   ```php
   route_defaults()->set('slug', 'my-default-slug');
   ```

2. Generate a URL without passing the `slug` parameter:

   ```php
   $url = routeWithDefault('vendor.home');
   echo $url; // Outputs: /my-default-slug/dashboard
   ```

3. Redirect to a route:

   ```php
   return to_routeWithDefault('vendor.home');
   ```

## Helpers Included

- **`route_defaults`**: Access the `RouteParameterDefaults` instance.
- **`routeWithDefault`**: Generate a route URL with default parameters.
- **`to_routeWithDefault`**: Redirect to a route with default parameters.

## How It Works

The package binds a singleton instance of `RouteParameterDefaults` to the service container. This instance manages the default values for route parameters and integrates them seamlessly into Laravel's route generation and redirection mechanisms.

## License

This package is open-source software licensed under the [MIT license](LICENSE).

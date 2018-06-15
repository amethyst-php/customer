<?php

namespace Railken\LaraOre;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Railken\LaraOre\Api\Support\Router;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/ore.customer.php' => config_path('ore.customer.php')], 'config');
        $this->publishes([__DIR__.'/../config/ore.customer-address.php' => config_path('ore.customer-address.php')], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutes();

        config(['ore.user.permission.managers' => array_merge(Config::get('ore.user.permission.managers'), [
            \Railken\LaraOre\Customer\CustomerManager::class,
        ])]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\ApiServiceProvider::class);
        $this->app->register(\Railken\LaraOre\AddressServiceProvider::class);
        $this->app->register(\Railken\LaraOre\TaxonomyServiceProvider::class);
        $this->app->register(\Railken\LaraOre\UserServiceProvider::class);
        $this->app->register(\Railken\LaraOre\LegalEntityServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../config/ore.customer.php', 'ore.customer');
        $this->mergeConfigFrom(__DIR__.'/../config/ore.customer-address.php', 'ore.customer-address');
    }

    /**
     * Load routes.
     *
     * @return void
     */
    public function loadRoutes()
    {
        Router::group(array_merge(Config::get('ore.customer.router'), [
            'namespace' => 'Railken\LaraOre\Http\Controllers',
        ]), function ($router) {
            $router->get('/', ['uses' => 'CustomersController@index']);
            $router->post('/', ['uses' => 'CustomersController@create']);
            $router->put('/{id}', ['uses' => 'CustomersController@update']);
            $router->delete('/{id}', ['uses' => 'CustomersController@remove']);
            $router->get('/{id}', ['uses' => 'CustomersController@show']);
        });

        Router::group(array_merge(Config::get('ore.customer-address.router'), [
            'namespace' => 'Railken\LaraOre\Http\Controllers',
        ]), function ($router) {
            $router->get('/', ['uses' => 'CustomerAddressesController@index']);
            $router->post('/{id}', ['uses' => 'CustomerAddressesController@create']);
            $router->delete('/{id}', ['uses' => 'CustomerAddressesController@remove']);
        });
    }
}

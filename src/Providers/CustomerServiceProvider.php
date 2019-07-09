<?php

namespace Amethyst\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Amethyst\Api\Support\Router;
use Amethyst\Common\CommonServiceProvider;

class CustomerServiceProvider extends CommonServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->loadExtraRoutes();
        $this->app->register(\Amethyst\Providers\AddressServiceProvider::class);
        $this->app->register(\Amethyst\Providers\LegalEntityServiceProvider::class);
    }

    /**
     * Load Extra routes.
     */
    public function loadExtraRoutes()
    {
        $config = Config::get('amethyst.customer.http.admin.customer-address');

        if (Arr::get($config, 'enabled')) {
            Router::group('admin', Arr::get($config, 'router'), function ($router) use ($config) {
                $controller = Arr::get($config, 'controller');

                $router->get('/', ['as' => 'index', 'uses' => $controller.'@index']);
                $router->post('/{id}', ['as' => 'attach', 'uses' => $controller.'@attach']);
                $router->delete('/{id}', ['as' => 'detach', 'uses' => $controller.'@detach']);
            });
        }
    }
}

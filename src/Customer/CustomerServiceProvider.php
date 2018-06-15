<?php

namespace Railken\LaraOre\Customer;

use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Customer::observe(CustomerObserver::class);
    }
}

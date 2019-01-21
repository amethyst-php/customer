<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Data
    |--------------------------------------------------------------------------
    |
    | Here you can change the table name and the class components.
    |
    */
    'data' => [
        'customer' => [
            'table'      => 'amethyst_customers',
            'comment'    => 'Customer',
            'model'      => Railken\Amethyst\Models\Customer::class,
            'schema'     => Railken\Amethyst\Schemas\CustomerSchema::class,
            'repository' => Railken\Amethyst\Repositories\CustomerRepository::class,
            'serializer' => Railken\Amethyst\Serializers\CustomerSerializer::class,
            'validator'  => Railken\Amethyst\Validators\CustomerValidator::class,
            'authorizer' => Railken\Amethyst\Authorizers\CustomerAuthorizer::class,
            'faker'      => Railken\Amethyst\Fakers\CustomerFaker::class,
            'manager'    => Railken\Amethyst\Managers\CustomerManager::class,
        ],
        'customer-address' => [
            'table' => 'amethyst_customer_addresses',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Http configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the routes
    |
    */
    'http' => [
        'admin' => [
            'customer' => [
                'enabled'    => true,
                'controller' => Railken\Amethyst\Http\Controllers\Admin\CustomersController::class,
                'router'     => [
                    'as'     => 'customer.',
                    'prefix' => '/customers',
                ],
            ],
            'customer-address' => [
                'enabled'    => true,
                'controller' => Railken\Amethyst\Http\Controllers\Admin\CustomerAddressesController::class,
                'router'     => [
                    'as'     => 'customer-address.',
                    'prefix' => '/customers/{container_id}/addresses',
                ],
            ],
        ],
    ],
];

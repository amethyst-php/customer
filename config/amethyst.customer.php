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
            'model'      => Amethyst\Models\Customer::class,
            'schema'     => Amethyst\Schemas\CustomerSchema::class,
            'repository' => Amethyst\Repositories\CustomerRepository::class,
            'serializer' => Amethyst\Serializers\CustomerSerializer::class,
            'validator'  => Amethyst\Validators\CustomerValidator::class,
            'authorizer' => Amethyst\Authorizers\CustomerAuthorizer::class,
            'faker'      => Amethyst\Fakers\CustomerFaker::class,
            'manager'    => Amethyst\Managers\CustomerManager::class,
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
                'controller' => Amethyst\Http\Controllers\Admin\CustomersController::class,
                'router'     => [
                    'as'     => 'customer.',
                    'prefix' => '/customers',
                ],
            ],
            'customer-address' => [
                'enabled'    => true,
                'controller' => Amethyst\Http\Controllers\Admin\CustomerAddressesController::class,
                'router'     => [
                    'as'     => 'customer-address.',
                    'prefix' => '/customers/{container_id}/addresses',
                ],
            ],
        ],
    ],
];

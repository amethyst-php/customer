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
    ],
];

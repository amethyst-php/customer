<?php

namespace Railken\LaraOre\Customer;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class CustomerAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'customer.create',
        Tokens::PERMISSION_UPDATE => 'customer.update',
        Tokens::PERMISSION_SHOW   => 'customer.show',
        Tokens::PERMISSION_REMOVE => 'customer.remove',
    ];
}

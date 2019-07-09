<?php

namespace Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class CustomerAuthorizer extends Authorizer
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

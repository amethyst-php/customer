<?php

namespace Amethyst\Managers;

use Amethyst\Core\ConfigurableManager;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Models\Customer                 newEntity()
 * @method \Amethyst\Schemas\CustomerSchema          getSchema()
 * @method \Amethyst\Repositories\CustomerRepository getRepository()
 * @method \Amethyst\Serializers\CustomerSerializer  getSerializer()
 * @method \Amethyst\Validators\CustomerValidator    getValidator()
 * @method \Amethyst\Authorizers\CustomerAuthorizer  getAuthorizer()
 */
class CustomerManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.customer.data.customer';
}

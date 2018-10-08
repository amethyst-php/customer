<?php

namespace Railken\Amethyst\Http\Controllers\Admin;

use Railken\Amethyst\Api\Http\Controllers\RestManagerController;
use Railken\Amethyst\Api\Http\Controllers\Traits;
use Railken\Amethyst\Managers\AddressManager;
use Railken\Amethyst\Managers\CustomerManager;
use Railken\Lem\Contracts\EntityContract;

class CustomerAddressesController extends RestManagerController
{
    use Traits\RestManyIndexTrait;
    use Traits\RestAttachTrait;
    use Traits\RestDetachTrait;

    /**
     * The class of the manager.
     *
     * @var string
     */
    public $class = CustomerManager::class;

    /**
     * Retrieve relation route name given entity.
     *
     * @param EntityContract $entity
     *
     * @return string
     */
    public function getRelationRoute(EntityContract $entity)
    {
        return 'admin.address.index';
    }

    /**
     * Retrieve name relation given entity.
     *
     * @param EntityContract $entity
     *
     * @return string
     */
    public function getRelationName(EntityContract $entity)
    {
        return 'addresses';
    }

    /**
     * Retrieve name relation given entity.
     *
     * @param EntityContract $entity
     *
     * @return \Railken\Lem\Contracts\ManagerContract
     */
    public function getRelationManager(EntityContract $entity)
    {
        return new AddressManager($this->getUser());
    }
}

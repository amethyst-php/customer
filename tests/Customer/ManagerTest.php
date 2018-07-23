<?php

namespace Railken\LaraOre\Tests\Customer;

use Railken\LaraOre\Customer\CustomerFaker;
use Railken\LaraOre\Customer\CustomerManager;
use Railken\LaraOre\Support\Testing\ManagerTestableTrait;

class ManagerTest extends BaseTest
{
    use ManagerTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new CustomerManager();
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getManager(), CustomerFaker::make()->parameters());
    }
}

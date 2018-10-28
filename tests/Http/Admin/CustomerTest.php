<?php

namespace Railken\Amethyst\Tests\Http\Admin;

use Railken\Amethyst\Api\Support\Testing\TestableBaseTrait;
use Railken\Amethyst\Fakers\AddressFaker;
use Railken\Amethyst\Fakers\CustomerFaker;
use Railken\Amethyst\Managers\AddressManager;
use Railken\Amethyst\Managers\CustomerManager;
use Railken\Amethyst\Tests\BaseTest;

class CustomerTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = CustomerFaker::class;

    /**
     * Router group resource.
     *
     * @var string
     */
    protected $group = 'admin';

    /**
     * Route name.
     *
     * @var string
     */
    protected $route = 'admin.customer';

    /**
     * Address tests.
     */
    public function testSuccessAddress()
    {
        $customer = (new CustomerManager())->create(CustomerFaker::make()->parameters())->getResource();

        $this->callAndTest('GET', route('admin.customer-address.index', ['container_id' => $customer->id]), [], 200);

        $address = (new AddressManager())->create(AddressFaker::make()->parameters())->getResource();

        $this->callAndTest('POST', route('admin.customer-address.attach', ['container_id' => $customer->id, 'id' => $address->id]), [], 200);
        $this->callAndTest('DELETE', route('admin.customer-address.detach', ['container_id' => $customer->id, 'id' => $address->id]), [], 200);
    }
}

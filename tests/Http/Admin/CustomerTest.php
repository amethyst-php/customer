<?php

namespace Railken\Amethyst\Tests\Http\Admin;

use Illuminate\Support\Facades\Config;
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
     * Base path config.
     *
     * @var string
     */
    protected $config = 'amethyst.customer.http.admin.customer';

    /**
     * Address tests.
     */
    public function testSuccessAddress()
    {
        $customer = (new CustomerManager())->create(CustomerFaker::make()->parameters())->getResource();
        $url = $this->getResourceUrl().'/'.$customer->id.'/addresses';

        $this->callAndTest('GET', $url, [], 200);

        $address = (new AddressManager())->create(AddressFaker::make()->parameters())->getResource();

        $this->callAndTest('POST', $url.'/'.$address->id, [], 200);
        $this->callAndTest('DELETE', $url.'/'.$address->id, [], 200);
    }
}

<?php

namespace Railken\LaraOre\Tests\Customer;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Address\AddressFaker;
use Railken\LaraOre\Address\AddressManager;
use Railken\LaraOre\Api\Support\Testing\TestableBaseTrait;
use Railken\LaraOre\Customer\CustomerFaker;
use Railken\LaraOre\Customer\CustomerManager;

class ApiTest extends BaseTest
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
    protected $config = 'ore.customer';

    /**
     * Address tests.
     */
    public function testSuccessAddress()
    {
        $customer = (new CustomerManager())->create(CustomerFaker::make()->parameters())->getResource();
        $url = Config::get('ore.api.http.admin.router.prefix').Config::get('ore.customer.http.admin.router.prefix').'/'.$customer->id.'/addresses';

        $this->callAndTest('GET', $url, [], 200);

        $address = (new AddressManager())->create(AddressFaker::make()->parameters())->getResource();

        $this->callAndTest('POST', $url.'/'.$address->id, [], 200);
        $this->callAndTest('DELETE', $url.'/'.$address->id, [], 200);
    }
}

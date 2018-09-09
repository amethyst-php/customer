<?php

namespace Railken\LaraOre\Tests\Customer;

use Illuminate\Support\Facades\Config;
use Railken\Bag;
use Railken\LaraOre\Address\AddressFaker;
use Railken\LaraOre\Address\AddressManager;
use Railken\LaraOre\Api\Support\Testing\TestableTrait;
use Railken\LaraOre\Customer\CustomerFaker;
use Railken\LaraOre\Customer\CustomerManager;

class ApiTest extends BaseTest
{
    use TestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return Config::get('ore.api.http.admin.router.prefix').Config::get('ore.customer.http.admin.router.prefix');
    }

    /**
     * Test common requests.
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), CustomerFaker::make()->parameters());
    }

    public function testSuccessAddress()
    {
        $customer = (new CustomerManager())->create(CustomerFaker::make()->parameters())->getResource();
        $url = Config::get('ore.api.http.admin.router.prefix').Config::get('ore.customer.http.admin.router.prefix').'/'.$customer->id.'/addresses';

        // GET /
        $response = $this->get($url, []);
        $this->assertOrPrint('GET', $url, new Bag(), $response, 200);

        $address = (new AddressManager())->create(AddressFaker::make()->parameters())->getResource();

        // POST
        $response = $this->post($url.'/'.$address->id, []);
        $this->assertOrPrint('POST', $url.'/'.$address->id, new Bag(), $response, 200);

        // DELETE
        $response = $this->delete($url.'/'.$address->id, []);
        $this->assertOrPrint('DELETE', $url.'/'.$address->id, new Bag(), $response, 200);
    }
}

<?php

namespace Railken\LaraOre\Tests\Customer;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Support\Testing\ApiTestableTrait;

class ApiTest extends BaseTest
{
    use ApiTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return Config::get('ore.api.router.prefix').Config::get('ore.customer.http.admin.router.prefix');
    }

    /**
     * Test common requests.
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), $parameters = $this->getParameters());
    }

    public function testSuccessAddress()
    {
        $customer = $this->newCustomer();
        $url = Config::get('ore.api.router.prefix').Config::get('ore.customer.router.prefix').'/'.$customer->id.'/addresses';

        // GET /
        $response = $this->get($url, []);
        $this->assertOrPrint($response, 200);

        $address = $this->newAddress();

        // POST
        $response = $this->post($url.'/'.$address->id, []);
        $this->assertOrPrint($response, 200);

        // DELETE
        $response = $this->delete($url.'/'.$address->id, []);
        $this->assertOrPrint($response, 200);
    }
}

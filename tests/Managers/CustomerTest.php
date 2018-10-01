<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\CustomerFaker;
use Railken\Amethyst\Managers\CustomerManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class CustomerTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = CustomerManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = CustomerFaker::class;
}

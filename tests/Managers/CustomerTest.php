<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\CustomerFaker;
use Amethyst\Managers\CustomerManager;
use Amethyst\Tests\BaseTest;
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

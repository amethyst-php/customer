<?php

namespace Railken\LaraOre\Customer;

use Faker\Factory;
use Railken\Bag;
use Railken\LaraOre\LegalEntity\LegalEntityFaker;
use Railken\Laravel\Manager\BaseFaker;

class CustomerFaker extends BaseFaker
{
    /**
     * @var string
     */
    protected $manager = CustomerManager::class;

    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name);
        $bag->set('notes', $faker->text);
        $bag->set('legal_entity', LegalEntityFaker::make()->parameters()->toArray());

        return $bag;
    }
}

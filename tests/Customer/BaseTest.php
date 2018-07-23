<?php

namespace Railken\LaraOre\Tests\Customer;

use Railken\Bag;
use Railken\LaraOre\Address\AddressManager;
use Railken\LaraOre\Customer\CustomerManager;
use Railken\LaraOre\LegalEntity\LegalEntityManager;
use Railken\LaraOre\LegalEntityContact\LegalEntityContactManager;
use Railken\LaraOre\Taxonomy\TaxonomyManager;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:fresh');
        // $this->artisan('vendor:publish', ['--provider' => 'Railken\LaraOre\CustomerServiceProvider', '--force' => true]);
        $this->artisan('lara-ore:user:install');
        $this->artisan('migrate');
    }

    /**
     * New LegalEntity.
     *
     * @return \Railken\LaraOre\LegalEntity\LegalEntity
     */
    public function newLegalEntity()
    {
        $bag = new Bag();
        $bag->set('name', str_random(40));
        $bag->set('notes', str_random(40));
        $bag->set('country_iso', 'IT');
        $bag->set('vat_number', '203458239B01');
        $bag->set('code_vat', '203458239B01');
        $bag->set('code_tin', '203458239B01');
        $bag->set('code_it_rea', '123');
        $bag->set('code_it_sia', '123');
        $bag->set('registered_office_address_id', $this->newAddress()->id);

        $lem = new LegalEntityManager();

        return $lem->create($bag)->getResource();
    }

    /**
     * New address.
     *
     * @return \Railken\LaraOre\Address\Address
     */
    public function newAddress()
    {
        $am = new AddressManager();

        $bag = new Bag();
        $bag->set('name', 'El. psy. congroo.');
        $bag->set('street', str_random(40));
        $bag->set('zip_code', '00100');
        $bag->set('city', 'ROME');
        $bag->set('province', 'RM');
        $bag->set('country', 'IT');

        return $am->create($bag)->getResource();
    }

    /**
     * New Taxonomy.
     *
     * @return \Railken\LaraOre\Taxonomy\Taxonomy
     */
    public function newTaxonomy()
    {
        $lecm = new LegalEntityContactManager();

        $bag = new Bag();
        $bag->set('name', 'Ban');
        $bag->set('vocabulary_id', $lecm->getTaxonomyVocabulary()->id);

        $le = new TaxonomyManager();

        return $le->create($bag)->getResource();
    }

    /**
     * Retrieve correct Bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new Bag();
        $bag->set('name', str_random(40));
        $bag->set('notes', str_random(40));
        $bag->set('legal_entity_id', $this->newLegalEntity()->id);

        return $bag;
    }

    /**
     * Retrieve correct Bag of parameters.
     *
     * @return Bag
     */
    public function newCustomer()
    {
        $cm = new CustomerManager();

        return $cm->create($this->getParameters())->getResource();
    }

    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\CustomerServiceProvider::class,
        ];
    }
}

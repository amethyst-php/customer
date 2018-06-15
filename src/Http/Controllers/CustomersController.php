<?php

namespace Railken\LaraOre\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\Customer\CustomerManager;

class CustomersController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    public $queryable = [
        'id',
        'name',
        'notes',
        'legal_entity_id',
        'created_at',
        'updated_at',
    ];

    public $fillable = [
        'name',
        'notes',
        'legal_entity_id',
    ];

    /**
     * Construct.
     */
    public function __construct(CustomerManager $manager)
    {
        $this->queryable = array_merge($this->queryable, array_keys(Config::get('ore.customer.attributes')));
        $this->fillable = array_merge($this->fillable, array_keys(Config::get('ore.customer.attributes')));
        $this->manager = $manager;
        $this->manager->setAgent($this->getUser());
        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}

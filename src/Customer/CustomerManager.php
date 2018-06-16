<?php

namespace Railken\LaraOre\Customer;

use Illuminate\Support\Facades\Config;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class CustomerManager extends ModelManager
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Customer::class;

    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Name\NameAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Notes\NotesAttribute::class,
        Attributes\LegalEntityId\LegalEntityIdAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\CustomerNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->attributes = array_merge($this->attributes, array_values(Config::get('ore.customer.attributes')));
        $this->setRepository(new CustomerRepository($this));
        $this->setSerializer(new CustomerSerializer($this));
        $this->setValidator(new CustomerValidator($this));
        $this->setAuthorizer(new CustomerAuthorizer($this));

        parent::__construct($agent);
    }
}

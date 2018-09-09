<?php

namespace Railken\LaraOre\Customer\Attributes\LegalEntityId;

use Railken\Laravel\Manager\Attributes\BelongsToAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class LegalEntityIdAttribute extends BelongsToAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'legal_entity_id';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\CustomerLegalEntityIdNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\CustomerLegalEntityIdNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\CustomerLegalEntityIdNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\CustomerLegalEntityIdNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'customer.attributes.legal_entity_id.fill',
        Tokens::PERMISSION_SHOW => 'customer.attributes.legal_entity_id.show',
    ];

    /**
     * Retrieve the name of the relation.
     *
     * @return string
     */
    public function getRelationName()
    {
        return 'legal_entity';
    }

    /**
     * Retrieve eloquent relation.
     *
     * @param \Railken\LaraOre\Customer\Customer $entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getRelationBuilder(EntityContract $entity)
    {
        return $entity->legal_entity();
    }

    /**
     * Retrieve relation manager.
     *
     * @param \Railken\LaraOre\Customer\Customer $entity
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getRelationManager(EntityContract $entity)
    {
        return new \Railken\LaraOre\LegalEntity\LegalEntityManager($this->getManager()->getAgent());
    }
}

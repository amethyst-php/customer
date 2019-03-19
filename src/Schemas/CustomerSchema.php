<?php

namespace Railken\Amethyst\Schemas;

use Railken\Amethyst\Managers\LegalEntityManager;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class CustomerSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name')
                ->setRequired(true),
            Attributes\TextAttribute::make('code'),
            Attributes\LongTextAttribute::make('notes'),
            Attributes\BelongsToAttribute::make('legal_entity_id')
                ->setRelationName('legal_entity')
                ->setRelationManager(LegalEntityManager::class),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}

<?php

namespace Railken\Amethyst\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Railken\Lem\Contracts\EntityContract;

class Customer extends Model implements EntityContract
{
    use SoftDeletes;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('amethyst.customer.managers.customer.table');

        $classSchema = Config::get('amethyst.customer.managers.customer.schema');
        $this->fillable = (new $classSchema())->getNameFillableAttributes();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function legal_entity()
    {
        return $this->belongsTo(LegalEntity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function addresses()
    {
        return $this->belongsToMany(Address::class, Config::get('amethyst.customer.managers.customer-address.table'), 'customer_id', 'address_id');
    }
}

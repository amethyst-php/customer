<?php

namespace Amethyst\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Amethyst\Common\ConfigurableModel;
use Railken\Lem\Contracts\EntityContract;

class Customer extends Model implements EntityContract
{
    use SoftDeletes;
    use ConfigurableModel;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->ini('amethyst.customer.data.customer');
        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function legal_entity(): BelongsTo
    {
        return $this->belongsTo(config('amethyst.legal-entity.data.legal-entity.model'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(config('amethyst.address.data.address.model'), Config::get('amethyst.customer.data.customer-address.table'), 'customer_id', 'address_id');
    }
}

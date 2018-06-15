<?php

namespace Railken\LaraOre\Customer\Attributes\CreatedAt\Exceptions;

use Railken\LaraOre\Customer\Exceptions\CustomerAttributeException;

class CustomerCreatedAtNotUniqueException extends CustomerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CUSTOMER_CREATED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}

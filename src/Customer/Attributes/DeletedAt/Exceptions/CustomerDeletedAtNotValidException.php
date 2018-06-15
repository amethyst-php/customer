<?php

namespace Railken\LaraOre\Customer\Attributes\DeletedAt\Exceptions;

use Railken\LaraOre\Customer\Exceptions\CustomerAttributeException;

class CustomerDeletedAtNotValidException extends CustomerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CUSTOMER_DELETED_AT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}

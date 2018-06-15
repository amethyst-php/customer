<?php

namespace Railken\LaraOre\Customer\Attributes\Id\Exceptions;

use Railken\LaraOre\Customer\Exceptions\CustomerAttributeException;

class CustomerIdNotUniqueException extends CustomerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CUSTOMER_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}

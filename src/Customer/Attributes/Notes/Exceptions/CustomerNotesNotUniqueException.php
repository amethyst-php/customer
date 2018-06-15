<?php

namespace Railken\LaraOre\Customer\Attributes\Notes\Exceptions;

use Railken\LaraOre\Customer\Exceptions\CustomerAttributeException;

class CustomerNotesNotUniqueException extends CustomerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'notes';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CUSTOMER_NOTES_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}

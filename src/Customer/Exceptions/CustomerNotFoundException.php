<?php

namespace Railken\LaraOre\Customer\Exceptions;

class CustomerNotFoundException extends CustomerException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CUSTOMER_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}

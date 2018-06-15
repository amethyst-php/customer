<?php

namespace Railken\LaraOre\Customer\Exceptions;

class CustomerNotAuthorizedException extends CustomerException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CUSTOMER_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}

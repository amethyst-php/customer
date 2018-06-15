<?php

namespace Railken\LaraOre\Customer\Exceptions;

abstract class CustomerAttributeException extends CustomerException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute;

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CUSTOMER_ATTRIBUTE_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is invalid';

    /**
     * Construct.
     *
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $this->label = $this->attribute;

        parent::__construct($value);
    }
}

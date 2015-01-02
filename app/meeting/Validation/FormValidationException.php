<?php namespace Meeting\Validation;
use Exception;

/**
 * User: Anouar (dtekind@gmail.com)
 * Date: 19/12/2014
 * Time: 17:11
 */

class FormValidationException extends Exception {

    /**
     * @var mixed
     */
    protected $errors;

    /**
     * @param string $message
     * @param mixed  $errors
     */
    function __construct($message, $errors)
    {

        $this->errors = $errors;

        parent::__construct($message);
    }

    /**
     * Get form validation errors
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

}
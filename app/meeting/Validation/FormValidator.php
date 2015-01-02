<?php
/**
 * User: Anouar (dtekind@gmail.com)
 * Date: 19/12/2014
 * Time: 17:17
 */

namespace Meeting\Validation;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Factory as ValidatorFactory;
use Meeting\Contracts\ValidationInterface;
abstract class FormValidator implements ValidationInterface{

    /**
     * @var ValidatorFactory
     */
    protected $validator;

    /**
     * @var ValidatorInstance
     */
    protected $validation;


    /**
     * @param ValidatorFactory $validator
     */
    function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validate the form data
     *
     * @param  mixed $formData
     * @return mixed
     * @throws FormValidationException
     */
    public function validate($formData)
    {
        $formData = $this->normalizeFormData($formData);

        $this->validation = $this->validator->make(
            $formData,
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        if ($this->validation->fails())
        {
            throw new FormValidationException('Validation failed', $this->getValidationErrors());
        }

        return true;
    }

    /**
     * @return array
     */
    public function getValidationRules()
    {
        return $this->rules;
    }

    /**
     * @return mixed
     */
    public function getValidationErrors()
    {
        if( ! empty($this->validation->getCustomMessages()))
        {
            return new MessageBag($this->validation->getCustomMessages());
        }

        return $this->validation->errors();
    }

    /**
     * @return mixed
     */
    public function getValidationMessages()
    {
        return $this->messages;
    }

    /**
     * Normalize the provided data to an array.
     *
     * @param  mixed $formData
     * @return array
     */
    protected function normalizeFormData($formData)
    {
        // If an object was provided, maybe the user
        // is giving us something like a DTO.
        // In that case, we'll grab the public properties
        // off of it, and use that.
        if (is_object($formData))
        {
            return get_object_vars($formData);
        }

        // Otherwise, we'll just stick with what they provided.
        return $formData;
    }

}
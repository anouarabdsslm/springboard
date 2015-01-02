<?php
/**
 * User: Anouar (dtekind@gmail.com)
 * Date: 19/12/2014
 * Time: 00:16
 */

namespace Meeting\Members;

use Meeting\Validation\FormValidator;

class AuthenticateUserValidator extends  FormValidator{

    /**
     * Validation rules for the AuthenticateUser form.
     *
     * @var array
     */
    protected $rules = [
        'email' =>'required',
        'password' =>'required',
    ];

    /**
     * Validation messages for the AuthenticateUser form.
     *
     * @var array
     */
    protected $messages = [
        'email'    => 'The :attribute address is required sir -_-.',
        'password'    => 'The :attribute is required sir -_-.',
    ];

}
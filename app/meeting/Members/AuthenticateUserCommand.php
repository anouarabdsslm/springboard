<?php
/**
 * User: Anouar (dtekind@gmail.com)
 * Date: 19/12/2014
 * Time: 00:02
 */

namespace Meeting\Members;


class AuthenticateUserCommand {

    public  $email;

    public  $password;

    /**
     * @param $email
     * @param $password
     */
    function __construct($email = null , $password = null)
    {
        $this->email = $email;
        $this->password = $password;
    }
}
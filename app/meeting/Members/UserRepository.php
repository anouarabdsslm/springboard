<?php namespace Meeting\Members;

use User;
class UserRepository extends User {


    public function getById($userId = null)
    {
        if( ! is_null($userId))
            return $this->find($userId);
        return null;
    }
}

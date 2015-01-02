<?php namespace Meeting\Members;

use UserMeta;
class UserMetaRepository extends UserMeta{



    /**
     * Username mutator
     *
     * @param string
     */
    public function setUsernameAttribute($value = null)
    {
        if (!is_null($value)) $this->attributes['username'] = strtolower($value);
    }

    /**
     * get user meta data base on id and field
     */
    public static function getMetaData($userId, $field)
    {
        $value = self::where('user_id', '=', $userId)->pluck("$field");

        if( empty($value)) return null;

        return $value;
    }



}

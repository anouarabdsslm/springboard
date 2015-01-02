<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryUser;

class User extends SentryUser implements UserInterface, RemindableInterface {
    //TODO: We may not need thus traits since we will use sentry
    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');


    /**
     * Users meta accessor
     */
    public function metas()
    {
        if ( $this->hasOne( 'UserMetaData', 'user_id' )->get()->count() == 0 )
        {
            // User has no metadata at all.
            // this could happens if he/she never update profile yet
            $meta = UserMeta::create( array(
                'username' => null,
            ) );
            $this->hasOne( 'UserMetaData', 'user_id' )->save( $meta );
        }

        return $this->hasOne( 'UserMetaData', 'user_id' );
    }

    public function invitees()
    {
        return $this->hasMany('Invitee','user_id');
    }

    public function rTasks()
    {
        return $this->hasMany('RTask','user_id');
    }

    public function rVotes()
    {
        return $this->hasMany('RVotes','user_id');
    }
}

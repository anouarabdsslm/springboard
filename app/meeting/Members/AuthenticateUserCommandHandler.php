<?php
/**
 * User: Anouar (dtekind@gmail.com)
 * Date: 19/12/2014
 * Time: 00:04
 */

namespace Meeting\Members;

use Meeting\Contracts\CommandHandlerInterface;
use Cartalyst\Sentry\Sentry;
class AuthenticateUserCommandHandler implements CommandHandlerInterface{
    /**
     * @var UserRepository
     */
    private $sentry;
    /**
     * @var UserRepository
     */
    private $user;


    /**
     * @param Sentry $sentry
     * @param UserRepository $user
     */
    function __construct(Sentry $sentry, UserRepository $user)
    {
        $this->sentry = $sentry;
        $this->user = $user;
    }

    public function handle($command)
    {
        $credentials = array(
            'email'    => $command->email,
            'password' => $command->password,
        );

        // Authenticate the user
        $authUser = $this->sentry->authenticate($credentials);

        return $this->user->getById($authUser->id);

    }

} 
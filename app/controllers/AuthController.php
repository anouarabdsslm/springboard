<?php
use Meeting\Members\AuthenticateUserCommand;
/**
 * User: Anouar (dtekind@gmail.com)
 * Date: 18/12/2014
 * Time: 23:46
 */

class AuthController extends BaseController {


    /*
     * Authenticate a user
     */
    public function actionLogin()
    {
        $command = new AuthenticateUserCommand('anouar@test.com','xroot');

        $user = $this->commandBus->execute($command);

        dd($user);

        return View::make('users.profile',compact('user'));

    }

    /*
     * Login out a user
     */
    public function actionLogout()
    {

        $this->sentry->logout();

        return Redirect::to('/');
    }

}
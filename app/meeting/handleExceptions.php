<?php
    App::error(function(Meeting\Validation\FormValidationException $exception, $code)
    {
        dd($exception->getErrors());
        return Redirect::back()->withInput()->withErrors($exception->getErrors());
    });

    App::error(function(Cartalyst\Sentry\Users\UserNotFoundException $exception, $code)
    {
        //We can custom our Authentication error message here
        $message = 'Email address or password incorrect';
        $errors = new Illuminate\Support\MessageBag(array($message));
        $userNotFoundEx =  new Meeting\Validation\FormValidationException('Authentication failed',$errors);
        dd($userNotFoundEx->getErrors());
        return Redirect::back()->withInput()->withErrors($userNotFoundEx->getErrors());
    });

    App::error(function(Cartalyst\Sentry\Users\WrongPasswordException $exception, $code)
    {
        $message = 'Email address or password incorrect';
        $errors = new Illuminate\Support\MessageBag(array($message));
        $wrongPasswordEx =  new Meeting\Validation\FormValidationException('Authentication failed',$errors);
        dd($wrongPasswordEx->getErrors());
        return Redirect::back()->withInput()->withErrors($wrongPasswordEx->getErrors());
    });
<?php namespace Meeting\Commanding;

use Illuminate\Foundation\Application;

class CommandBus {
    /**
     * @var CommandTranslator
     */
    protected $commandTranslator;
    /**
     * @var Application
     */
    protected $app;


    /**
     * @param Application $app
     * @param CommandTranslator $commandTranslator
     */
    function __construct(Application $app, CommandTranslator $commandTranslator)
    {

        $this->commandTranslator = $commandTranslator;
        $this->app = $app;
    }

    protected function execute($command)
    {

        /*
         * Translate object name to handler class
         * Since commandBus is not responsible for handle the way we
         * translate our object we can create new class dedicated for that.
         * this will return the validator class name Meeting\Meetings\PostMeetingCommandHandler
        */
        $handler = $this->commandTranslator->toCommandHandler($command);

        //resolve out of ioc container and run handle method on it
        return $this->app->make($handler)->handle($command);
    }
} 
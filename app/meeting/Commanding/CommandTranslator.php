<?php namespace Meeting\Commanding;

use Exception;

class CommandTranslator {


    /**
     * @param $command
     * @return mixed
     * @throws Exception
     */
    public function toCommandHandler($command)
    {
        //this will return the path to the commandHandler if exist
        $handler = str_replace('Command','CommandHandler',get_class($command));
        //check if exist if not throw an execption
        if( !class_exists($handler))
        {
            $message =  "Command handler [$handler] does not exist.";
            throw new Exception($message);
        }

        return $handler;
    }

    public function toValidator($command)
    {
        return str_replace('Command','Validator',get_class($command));
    }
} 
<?php namespace Meeting\Commanding;

class ValidatorCommandBus extends CommandBus {

    public function execute($command)
    {
        /*
         * Translate object name to Validator class
         * Since commandBus is not responsible for handle the way we
         * translate our object we can create new class dedicated for that.
         * this will return the validator class name Meeting\Meetings\PostMeetingValidator
        */
        $validator = $this->commandTranslator->toValidator($command);
        //check if the validator exist
        if(class_exists($validator))
        {
            //resolve out of ioc container and run validate method on it
            $this->app->make($validator)->validate($command);

            //Handle the command throw commandBus
            return parent::execute($command);
        }

    }

} 
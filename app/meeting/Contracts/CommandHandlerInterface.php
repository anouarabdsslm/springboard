<?php namespace Meeting\Contracts;

Interface CommandHandlerInterface {

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command);
} 
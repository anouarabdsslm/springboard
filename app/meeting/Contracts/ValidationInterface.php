<?php namespace Meeting\Contracts;

interface ValidationInterface {
    /**
     * @param $command
     * @return mixed
     */
    public  function validate($command);
} 
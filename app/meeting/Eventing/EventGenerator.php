<?php namespace Meeting\Eventing;

trait EventGenerator {


    public $pendingEvents = [];

    /**
     * Here we are storing our events for latet firing
     * @param $event
     */
    public function raise($event)
    {
        $this->pendingEvents[] = $event;
    }

    //clean up events and release it(dispatch)
    public function releaseEvents()
    {
        //Store the current events
        $events = $this->pendingEvents;
        //clear the events
        $this->pendingEvents = [];
        //return the current events
        return $events;
    }
}
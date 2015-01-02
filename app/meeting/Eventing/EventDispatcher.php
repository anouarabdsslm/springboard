<?php namespace Meeting\Eventing;

use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer;

class EventDispatcher {


    /**
     * @var Dispatcher
     */
    public $event;
    /**
     * @var Writer
     */
    public  $log;

    function __construct(Dispatcher $event, Writer $log)
    {
        $this->event = $event;
        $this->log = $log;
    }

    /**
     * Here we will fire all events
     * @param array $events
     */
    public function dispatch(array $events)
    {
        foreach($events as $event)
        {
            //fire the event by passing event name and data of the event($event)
            $eventName = $this->getEventName($event);

            $this->event->fire($eventName,$event);

            var_dump("Log : $eventName was fired");

            //Log Event
            $this->log->info("$eventName was fired");
        }
    }

    /**
     * @param $event
     * @return mixed
     */
    protected function getEventName($event)
    {
        //This will return something like Meeting.Meetings.MeetingWasPublished
        return  str_replace('\\', '.', get_class($event));
    }
} 
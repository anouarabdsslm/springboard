<?php namespace Meeting\Eventing;

use ReflectionClass;

class EventListener {

    public function handle($event)
    {
        //Get the event name
        $eventName = $this->getEventName($event);

        if($this->eventIsRegistered($eventName))
        {
            //call the method of the event in this case whenMeetingWasPublished
            return call_user_func([$this,"when".$eventName], $event);
        }
    }

    /**
     * Get the event name
     * @param $event
     * @return string
     */
    public function getEventName($event)
    {
        //This is will return something like MeetingWasPublished
        $eventName = (new ReflectionClass($event))->getShortName();
        return $eventName;
    }

    /**
     * @param $eventName
     * @return bool
     */
    public function eventIsRegistered($eventName)
    {
        //this is will check if the method whenMeetingWasPublished exist.
        $method = "when".$eventName;
        return method_exists($this, $method);
    }
} 
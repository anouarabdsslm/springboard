<?php namespace Meeting\Listeners;

use Meeting\Eventing\EventListener;
use Meeting\Meetings\MeetingWasPublished;

class EmailNotifier extends EventListener {

    public function whenMeetingWasPublished(MeetingWasPublished $event)
    {
        var_dump("Second: Do something with email notification when meeting was published : ".$event->meeting->title);
    }

    //ADD more handler for the Meeting
    //whenMeetingWasArchived for example
} 
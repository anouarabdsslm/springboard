<?php namespace Meeting\Eventing;

use Illuminate\Support\ServiceProvider;

class EventingServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //Get the event listeners.
        $listeners = $this->app['config']->get('meeting.listeners');

        foreach($listeners as $listener)
        {
            $this->app['events']->listen('Meeting.*', $listener);
        }
    }
}
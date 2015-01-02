<?php
use Cartalyst\Sentry\Sentry;
use Meeting\Commanding\ValidatorCommandBus;
class BaseController extends Controller {

    /**
     * @var CommandBus
     */
    protected  $commandBus;
    /**
     * @var Sentry
     */
    protected $sentry;


    /**
     * @param ValidatorCommandBus $commandBus
     * @param Sentry $sentry
     */

    function __construct(ValidatorCommandBus $commandBus, Sentry $sentry)
    {
        $this->commandBus = $commandBus;
        $this->sentry = $sentry;
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}

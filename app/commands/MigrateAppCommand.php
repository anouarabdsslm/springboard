<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MigrateAppCommand extends Command {

	/**
	 * Package names
	 *
	 * @var array
	 */
	private $packages = array(
		'cartalyst/sentry',
	);

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'migrate:app';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run all necessary migrations.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
        //migrate packages first
        $this->migratePackages();

        // Proxy to main migrating
        $this->line('Migrating "'.App::environment().'" application...');
        $this->call('migrate', array('--env' => App::environment()));


        $this->line('Done');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('refresh', null, InputOption::VALUE_OPTIONAL, 'Refreshing option.', null),
		);
	}

	/**
	 * Migrate all registered packages
	 *
	 * @return void
	 */
	private function migratePackages()
	{
		// Migrating all registered packages
		foreach ($this->packages as $package) {
			$this->line('Migrating "'.$package.'"...');
			$this->call('migrate', array('--env' => App::environment(), '--package' => $package));
		}
	}

}

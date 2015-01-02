<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $seeders = array('UserTableSeeder','GroupsTableSeeder');

        foreach($seeders as $seed)
        {
            $this->command->info("Seeding: {$seed}");
            $this->call($seed);
        }
	}

}

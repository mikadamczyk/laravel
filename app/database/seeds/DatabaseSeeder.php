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

		$this->call('UserTableSeeder');
		$this->call('ObslogsTableSeeder');
		$this->call('TechlogsTableSeeder');
		$this->call('ObjectsTableSeeder');
		$this->call('ProgramsTableSeeder');
		$this->call('TelescopesTableSeeder');
		$this->call('DetectorsTableSeeder');
		$this->call('FiltersTableSeeder');
		$this->call('TypesTableSeeder');
		$this->call('MessagesTableSeeder');
		$this->call('DevicesTableSeeder');
		$this->call('ConditionsTableSeeder');
		$this->call('AutoguidersTableSeeder');
		$this->call('FlatsTableSeeder');
	}

}
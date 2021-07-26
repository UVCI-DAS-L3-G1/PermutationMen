<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('DrenTableSeeder');
		$this->command->info('Dren table seeded!');

		$this->call('IepTableSeeder');
		$this->command->info('Iep table seeded!');
	}
}
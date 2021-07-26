<?php

use Illuminate\Database\Seeder;
use Models\Dren;

class DrenTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('drens')->delete();

		// 1
		Dren::create(array(
				'nom' => 'ABIDJAN 4'
			));

		// 2
		Dren::create(array(
				'nom' => 'ABIDJAN 3'
			));
	}
}
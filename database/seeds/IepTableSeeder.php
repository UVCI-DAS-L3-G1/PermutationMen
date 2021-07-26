<?php

use Illuminate\Database\Seeder;
use Models\Iep;

class IepTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('ieps')->delete();

		// 1
		Iep::create(array(
				'dren_id' => 1,
				'nom' => 'houantoue 1'
			));
	}
}
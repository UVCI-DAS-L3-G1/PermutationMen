<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIepsTable extends Migration {

	public function up()
	{
		Schema::create('ieps', function(Blueprint $table) {
			$table->increments('id', true);
			$table->integer('dren_id')->unsigned();
			$table->string('nom', 255)->unique();
		});
	}

	public function down()
	{
		Schema::drop('ieps');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEcolesTable extends Migration {

	public function up()
	{
		Schema::create('ecoles', function(Blueprint $table) {
			$table->increments('id', true);
			$table->integer('iep_id')->unsigned();
			$table->string('nom', 255);
		});
	}

	public function down()
	{
		Schema::drop('ecoles');
	}
}
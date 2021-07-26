<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDisciplinesTable extends Migration {

	public function up()
	{
		Schema::create('disciplines', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('nom', 255)->unique();
		});
	}

	public function down()
	{
		Schema::drop('disciplines');
	}
}
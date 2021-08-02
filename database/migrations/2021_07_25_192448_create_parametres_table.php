<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParametresTable extends Migration {

	public function up()
	{
		Schema::create('parametres', function(Blueprint $table) {
			$table->string('id', 255)->unique()->primary();
			$table->string('valeur', 255);
		});
	}

	public function down()
	{
		Schema::drop('parametres');
	}
}

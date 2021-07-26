<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration {

	public function up()
	{
		Schema::create('agents', function(Blueprint $table) {
			$table->bigInteger('id')->primary()->unsigned();
			$table->integer('ecole_id')->unsigned();
			$table->integer('fonction_id')->unsigned();
			$table->integer('emploi_id')->unsigned();
			$table->integer('discipline_id')->unsigned();
			$table->string('matricule', 255)->unique();
		});
	}

	public function down()
	{
		Schema::drop('agents');
	}
}
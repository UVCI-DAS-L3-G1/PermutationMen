<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvisPermutationsTable extends Migration {

	public function up()
	{
		Schema::create('avis_permutations', function(Blueprint $table) {
			$table->increments('id', true);
			$table->bigInteger('agent_demandeur_id')->unsigned();
			$table->integer('ecole_destination_id')->unsigned();
			$table->datetime('date_publication');
			$table->bigInteger('agent_interesse_id')->unsigned()->nullable();
			$table->datetime('date_reservation')->nullable();
			$table->datetime('date_confirmation')->nullable();
			$table->datetime('date_validation')->nullable();
			$table->tinyInteger('etat');
		});
	}

	public function down()
	{
		Schema::drop('avis_permutations');
	}
}
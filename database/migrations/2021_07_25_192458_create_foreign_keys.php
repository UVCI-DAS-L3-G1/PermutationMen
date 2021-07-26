<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('ieps', function(Blueprint $table) {
			$table->foreign('dren_id')->references('id')->on('drens')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ecoles', function(Blueprint $table) {
			$table->foreign('iep_id')->references('id')->on('ieps')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->foreign('id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->foreign('ecole_id')->references('id')->on('ecoles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->foreign('fonction_id')->references('id')->on('fonctions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->foreign('emploi_id')->references('id')->on('emplois')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->foreign('discipline_id')->references('id')->on('disciplines')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('avis_permutations', function(Blueprint $table) {
			$table->foreign('agent_demandeur_id')->references('id')->on('agents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('avis_permutations', function(Blueprint $table) {
			$table->foreign('ecole_destination_id')->references('id')->on('ecoles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('avis_permutations', function(Blueprint $table) {
			$table->foreign('agent_interesse_id')->references('id')->on('agents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('ieps', function(Blueprint $table) {
			$table->dropForeign('ieps_dren_id_foreign');
		});
		Schema::table('ecoles', function(Blueprint $table) {
			$table->dropForeign('ecoles_iep_id_foreign');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->dropForeign('agents_id_foreign');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->dropForeign('agents_ecole_id_foreign');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->dropForeign('agents_fonction_id_foreign');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->dropForeign('agents_emploi_id_foreign');
		});
		Schema::table('agents', function(Blueprint $table) {
			$table->dropForeign('agents_discipline_id_foreign');
		});
		Schema::table('avis_permutations', function(Blueprint $table) {
			$table->dropForeign('avis_permutations_agent_demandeur_id_foreign');
		});
		Schema::table('avis_permutations', function(Blueprint $table) {
			$table->dropForeign('avis_permutations_ecole_destination_id_foreign');
		});
		Schema::table('avis_permutations', function(Blueprint $table) {
			$table->dropForeign('avis_permutations_agent_interesse_id_foreign');
		});
	}
}
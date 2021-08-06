<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParametresTable extends Migration {

	public function up()
	{
		Schema::create('parametres', function(Blueprint $table) {
			$table->increments('id');
            $table->string('attribut', 255)->unique();
			$table->string('valeur', 255);
		});
	}

	public function down()
	{
		Schema::drop('parametres');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seasons', function(Blueprint $table)
		{
			$table->integer('id_season', true);
			$table->string('title', 45)->nullable();
			$table->integer('id_serie')->index('fk_Seasons_Series1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seasons');
	}

}

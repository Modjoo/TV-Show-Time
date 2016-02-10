<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpisodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('episodes', function(Blueprint $table)
		{
			$table->integer('id_episode', true);
			$table->string('title', 45);
			$table->string('duration', 45)->nullable();
			$table->string('description', 45)->nullable();
			$table->string('number', 45);
			$table->string('release_date', 45);
			$table->string('cover_img_url', 45)->nullable();
			$table->integer('id_season')->index('fk_Episodes_Seasons1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('episodes');
	}

}

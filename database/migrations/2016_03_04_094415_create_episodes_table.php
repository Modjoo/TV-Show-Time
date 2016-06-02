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
			$table->integer('id', true);
			$table->string('title', 100);
			$table->integer('duration')->nullable();
			$table->string('description', 1000)->nullable();
			$table->integer('number');
			$table->dateTime('release_date')->nullable();
			$table->string('cover_img_url', 200)->nullable();
			$table->integer('season_id')->index('fk_Episodes_Seasons1_idx');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGenresSeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('genres_series', function(Blueprint $table)
		{
			$table->string('id', 45)->unique('id_series_genre_UNIQUE');
			$table->integer('serie_id')->index('fk_Series_has_Genres_Series1_idx');
			$table->integer('genre_id')->index('fk_Series_has_Genres_Genres1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('genres_series');
	}

}

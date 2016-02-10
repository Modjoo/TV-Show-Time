<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeriesGenreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series_genre', function(Blueprint $table)
		{
			$table->string('id_series_genre', 45)->unique('id_series_genre_UNIQUE');
			$table->integer('id_serie')->index('fk_Series_has_Genres_Series1_idx');
			$table->integer('id_genre')->index('fk_Series_has_Genres_Genres1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('series_genre');
	}

}

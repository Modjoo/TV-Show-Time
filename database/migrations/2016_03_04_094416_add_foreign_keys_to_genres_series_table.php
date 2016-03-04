<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGenresSeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('genres_series', function(Blueprint $table)
		{
			$table->foreign('genre_id', 'fk_Series_has_Genres_Genres1')->references('id')->on('genres')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('serie_id', 'fk_Series_has_Genres_Series1')->references('id')->on('series')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('genres_series', function(Blueprint $table)
		{
			$table->dropForeign('fk_Series_has_Genres_Genres1');
			$table->dropForeign('fk_Series_has_Genres_Series1');
		});
	}

}

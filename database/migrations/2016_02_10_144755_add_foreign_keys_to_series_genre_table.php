<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSeriesGenreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('series_genre', function(Blueprint $table)
		{
			$table->foreign('id_genre', 'fk_Series_has_Genres_Genres1')->references('id_genre')->on('genres')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_serie', 'fk_Series_has_Genres_Series1')->references('id_serie')->on('series')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('series_genre', function(Blueprint $table)
		{
			$table->dropForeign('fk_Series_has_Genres_Genres1');
			$table->dropForeign('fk_Series_has_Genres_Series1');
		});
	}

}

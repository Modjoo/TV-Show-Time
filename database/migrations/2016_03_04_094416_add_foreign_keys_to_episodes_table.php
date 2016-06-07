<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEpisodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('episodes', function(Blueprint $table)
		{
			$table->foreign('serie_id', 'fk_Episodes_Series1')->references('id')->on('series')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('season_id', 'fk_Episodes_Seasons1')->references('id')->on('seasons')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('episodes', function(Blueprint $table)
		{
			$table->dropForeign('fk_Episodes_Series1');
			$table->dropForeign('fk_Episodes_Seasons1');
		});
	}

}

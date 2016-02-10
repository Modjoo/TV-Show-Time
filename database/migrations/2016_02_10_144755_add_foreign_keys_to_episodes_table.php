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
			$table->foreign('id_season', 'fk_Episodes_Seasons1')->references('id_season')->on('seasons')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('fk_Episodes_Seasons1');
		});
	}

}

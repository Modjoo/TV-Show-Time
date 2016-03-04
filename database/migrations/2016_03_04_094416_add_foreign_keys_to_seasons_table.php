<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSeasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seasons', function(Blueprint $table)
		{
			$table->foreign('serie_id', 'fk_Seasons_Series1')->references('id')->on('series')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('seasons', function(Blueprint $table)
		{
			$table->dropForeign('fk_Seasons_Series1');
		});
	}

}

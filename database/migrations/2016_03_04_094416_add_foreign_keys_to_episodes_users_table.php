<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEpisodesUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('episodes_users', function(Blueprint $table)
		{
			$table->foreign('episode_id', 'fk_User_has_Episodes_Episodes1')->references('id')->on('episodes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_User_has_Episodes_User')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('episodes_users', function(Blueprint $table)
		{
			$table->dropForeign('fk_User_has_Episodes_Episodes1');
			$table->dropForeign('fk_User_has_Episodes_User');
		});
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpisodesUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('episodes_users', function(Blueprint $table)
		{
			$table->integer('id')->unique('id_user_portfolio_UNIQUE');
			$table->integer('user_id')->index('fk_User_has_Episodes_User_idx');
			$table->integer('episode_id')->index('fk_User_has_Episodes_Episodes1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('episodes_users');
	}

}

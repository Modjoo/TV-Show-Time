<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersPortfolioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_portfolio', function(Blueprint $table)
		{
			$table->foreign('id_episode', 'fk_User_has_Episodes_Episodes1')->references('id_episode')->on('episodes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_user', 'fk_User_has_Episodes_User')->references('id_user')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_portfolio', function(Blueprint $table)
		{
			$table->dropForeign('fk_User_has_Episodes_Episodes1');
			$table->dropForeign('fk_User_has_Episodes_User');
		});
	}

}

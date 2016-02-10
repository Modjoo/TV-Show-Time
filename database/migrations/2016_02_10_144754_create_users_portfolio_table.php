<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersPortfolioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_portfolio', function(Blueprint $table)
		{
			$table->string('id_user_portfolio', 45)->unique('id_user_portfolio_UNIQUE');
			$table->integer('id_user')->index('fk_User_has_Episodes_User_idx');
			$table->integer('id_episode')->index('fk_User_has_Episodes_Episodes1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_portfolio');
	}

}

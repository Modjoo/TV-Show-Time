<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series', function(Blueprint $table)
		{
			$table->integer('id_serie', true);
			$table->string('title', 45);
			$table->string('synopsis', 45);
			$table->string('cover_img_url', 45)->nullable();
			$table->string('actors', 45)->nullable();
			$table->string('producer', 45)->nullable();
			$table->string('duration_pattern', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('series');
	}

}

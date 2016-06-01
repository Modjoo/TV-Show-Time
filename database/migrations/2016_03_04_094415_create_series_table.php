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
			$table->integer('id', true);
			$table->string('title', 45);
			$table->string('synopsis', 455);
			$table->string('cover_img_url')->nullable();
			$table->string('actors', 45)->nullable();
			$table->string('producer', 45)->nullable();
			$table->integer('duration_pattern')->nullable();
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

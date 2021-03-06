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
			$table->string('title', 60);
			$table->string('synopsis', 1000);
			$table->string('cover_img_url')->nullable();
			$table->string('actors', 1000)->nullable();
			$table->string('producer', 1000)->nullable();
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

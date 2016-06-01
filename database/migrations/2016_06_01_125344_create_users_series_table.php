<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersSeriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_series', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->integer('user_id')->index('fk_User_has_Series_User_idx');
            $table->integer('serie_id')->index('fk_User_has_Series_Series1_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_series');
    }

}

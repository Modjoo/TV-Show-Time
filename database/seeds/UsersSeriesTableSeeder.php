<?php

use Illuminate\Database\Seeder;

class UsersSeriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users_series')->delete();

        \DB::table('users_series')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'user_id' => 1,
                    'serie_id' => 6,
                ),
            1 =>
                array (
                    'id' => 2,
                    'user_id' => 1,
                    'serie_id' => 4,
                ),
            2 =>
                array (
                    'id' => 4,
                    'user_id' => 1,
                    'serie_id' => 1,
                ),
            3 =>
                array (
                    'id' => 5,
                    'user_id' => 1,
                    'serie_id' => 20,
                ),
            4 =>
                array (
                    'id' => 9,
                    'user_id' => 1,
                    'serie_id' => 44,
                ),
            5 =>
                array (
                    'id' => 10,
                    'user_id' => 1,
                    'serie_id' => 49,
                ),
        ));


    }
}

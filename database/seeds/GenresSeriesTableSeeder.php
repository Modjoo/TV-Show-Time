<?php

use Illuminate\Database\Seeder;

class GenresSeriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genres_series')->delete();
        
        \DB::table('genres_series')->insert(array (
            0 => 
            array (
                'id' => 1,
                'serie_id' => 1,
                'genre_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'serie_id' => 1,
                'genre_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'serie_id' => 1,
                'genre_id' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'serie_id' => 2,
                'genre_id' => 4,
            ),
            4 => 
            array (
                'id' => 5,
                'serie_id' => 2,
                'genre_id' => 5,
            ),
            5 => 
            array (
                'id' => 6,
                'serie_id' => 2,
                'genre_id' => 6,
            ),
            6 => 
            array (
                'id' => 7,
                'serie_id' => 3,
                'genre_id' => 2,
            ),
            7 => 
            array (
                'id' => 8,
                'serie_id' => 3,
                'genre_id' => 5,
            ),
            8 => 
            array (
                'id' => 9,
                'serie_id' => 3,
                'genre_id' => 7,
            ),
            9 => 
            array (
                'id' => 10,
                'serie_id' => 4,
                'genre_id' => 4,
            ),
            10 => 
            array (
                'id' => 11,
                'serie_id' => 4,
                'genre_id' => 5,
            ),
            11 => 
            array (
                'id' => 12,
                'serie_id' => 4,
                'genre_id' => 6,
            ),
            12 => 
            array (
                'id' => 13,
                'serie_id' => 5,
                'genre_id' => 8,
            ),
            13 => 
            array (
                'id' => 14,
                'serie_id' => 6,
                'genre_id' => 8,
            ),
            14 => 
            array (
                'id' => 15,
                'serie_id' => 7,
                'genre_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'serie_id' => 7,
                'genre_id' => 2,
            ),
            16 => 
            array (
                'id' => 17,
                'serie_id' => 7,
                'genre_id' => 3,
            ),
            17 => 
            array (
                'id' => 18,
                'serie_id' => 8,
                'genre_id' => 8,
            ),
            18 => 
            array (
                'id' => 19,
                'serie_id' => 8,
                'genre_id' => 9,
            ),
            19 => 
            array (
                'id' => 20,
                'serie_id' => 8,
                'genre_id' => 10,
            ),
            20 => 
            array (
                'id' => 21,
                'serie_id' => 9,
                'genre_id' => 4,
            ),
            21 => 
            array (
                'id' => 22,
                'serie_id' => 9,
                'genre_id' => 5,
            ),
            22 => 
            array (
                'id' => 23,
                'serie_id' => 10,
                'genre_id' => 2,
            ),
            23 => 
            array (
                'id' => 24,
                'serie_id' => 10,
                'genre_id' => 7,
            ),
            24 => 
            array (
                'id' => 25,
                'serie_id' => 10,
                'genre_id' => 11,
            ),
            25 => 
            array (
                'id' => 26,
                'serie_id' => 11,
                'genre_id' => 8,
            ),
            26 => 
            array (
                'id' => 27,
                'serie_id' => 11,
                'genre_id' => 9,
            ),
            27 => 
            array (
                'id' => 28,
                'serie_id' => 11,
                'genre_id' => 10,
            ),
            28 => 
            array (
                'id' => 29,
                'serie_id' => 12,
                'genre_id' => 3,
            ),
            29 => 
            array (
                'id' => 30,
                'serie_id' => 12,
                'genre_id' => 4,
            ),
            30 => 
            array (
                'id' => 31,
                'serie_id' => 12,
                'genre_id' => 5,
            ),
            31 => 
            array (
                'id' => 32,
                'serie_id' => 13,
                'genre_id' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'serie_id' => 13,
                'genre_id' => 12,
            ),
            33 => 
            array (
                'id' => 34,
                'serie_id' => 13,
                'genre_id' => 2,
            ),
            34 => 
            array (
                'id' => 35,
                'serie_id' => 14,
                'genre_id' => 3,
            ),
            35 => 
            array (
                'id' => 36,
                'serie_id' => 14,
                'genre_id' => 13,
            ),
            36 => 
            array (
                'id' => 37,
                'serie_id' => 14,
                'genre_id' => 14,
            ),
            37 => 
            array (
                'id' => 38,
                'serie_id' => 15,
                'genre_id' => 4,
            ),
            38 => 
            array (
                'id' => 39,
                'serie_id' => 15,
                'genre_id' => 5,
            ),
            39 => 
            array (
                'id' => 40,
                'serie_id' => 15,
                'genre_id' => 11,
            ),
            40 => 
            array (
                'id' => 41,
                'serie_id' => 16,
                'genre_id' => 2,
            ),
            41 => 
            array (
                'id' => 42,
                'serie_id' => 16,
                'genre_id' => 5,
            ),
            42 => 
            array (
                'id' => 43,
                'serie_id' => 16,
                'genre_id' => 15,
            ),
            43 => 
            array (
                'id' => 44,
                'serie_id' => 17,
                'genre_id' => 8,
            ),
            44 => 
            array (
                'id' => 45,
                'serie_id' => 18,
                'genre_id' => 16,
            ),
        ));
        
        
    }
}

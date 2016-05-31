<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seasons')->delete();
        
        \DB::table('seasons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Breaking Bad',
                'serie_id' => 2,
                'external_id' => '',
                'number' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Breaking Bad',
                'serie_id' => 2,
                'external_id' => '',
                'number' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Breaking Bad',
                'serie_id' => 2,
                'external_id' => '',
                'number' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Breaking Bad',
                'serie_id' => 2,
                'external_id' => '',
                'number' => 4,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Breaking Bad',
                'serie_id' => 2,
                'external_id' => '',
                'number' => 5,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Game of Thrones',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Game of Thrones',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 2,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Game of Thrones',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 3,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Game of Thrones',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 4,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Game of Thrones',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 5,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Game of Thrones',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 6,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Game of Thrones',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 7,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'The Wire',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'The Wire',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'The Wire',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 3,
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'The Wire',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 4,
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'The Wire',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 5,
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'Cosmos: A Spacetime Odyssey',
                'serie_id' => 5,
                'external_id' => '',
                'number' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Cosmos',
                'serie_id' => 6,
                'external_id' => '',
                'number' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'Rick and Morty',
                'serie_id' => 7,
                'external_id' => '',
                'number' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'Rick and Morty',
                'serie_id' => 7,
                'external_id' => '',
                'number' => 2,
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'Rick and Morty',
                'serie_id' => 7,
                'external_id' => '',
                'number' => 3,
            ),
            22 => 
            array (
                'id' => 23,
                'title' => 'The Civil War',
                'serie_id' => 8,
                'external_id' => '',
                'number' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'title' => 'The Sopranos',
                'serie_id' => 9,
                'external_id' => '',
                'number' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'title' => 'The Sopranos',
                'serie_id' => 9,
                'external_id' => '',
                'number' => 2,
            ),
            25 => 
            array (
                'id' => 26,
                'title' => 'The Sopranos',
                'serie_id' => 9,
                'external_id' => '',
                'number' => 3,
            ),
            26 => 
            array (
                'id' => 27,
                'title' => 'The Sopranos',
                'serie_id' => 9,
                'external_id' => '',
                'number' => 4,
            ),
            27 => 
            array (
                'id' => 28,
                'title' => 'The Sopranos',
                'serie_id' => 9,
                'external_id' => '',
                'number' => 5,
            ),
            28 => 
            array (
                'id' => 29,
                'title' => 'The Sopranos',
                'serie_id' => 9,
                'external_id' => '',
                'number' => 6,
            ),
            29 => 
            array (
                'id' => 30,
                'title' => 'The World at War',
                'serie_id' => 11,
                'external_id' => '',
                'number' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'title' => 'Avatar: The Last Airbender',
                'serie_id' => 13,
                'external_id' => '',
                'number' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'title' => 'Avatar: The Last Airbender',
                'serie_id' => 13,
                'external_id' => '',
                'number' => 2,
            ),
            32 => 
            array (
                'id' => 33,
                'title' => 'Avatar: The Last Airbender',
                'serie_id' => 13,
                'external_id' => '',
                'number' => 3,
            ),
            33 => 
            array (
                'id' => 34,
                'title' => 'Last Week Tonight with John Oliver',
                'serie_id' => 14,
                'external_id' => '',
                'number' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'title' => 'Last Week Tonight with John Oliver',
                'serie_id' => 14,
                'external_id' => '',
                'number' => 2,
            ),
            35 => 
            array (
                'id' => 36,
                'title' => 'Last Week Tonight with John Oliver',
                'serie_id' => 14,
                'external_id' => '',
                'number' => 3,
            ),
            36 => 
            array (
                'id' => 37,
                'title' => 'True Detective',
                'serie_id' => 15,
                'external_id' => '',
                'number' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'title' => 'True Detective',
                'serie_id' => 15,
                'external_id' => '',
                'number' => 2,
            ),
            38 => 
            array (
                'id' => 39,
                'title' => 'Firefly',
                'serie_id' => 16,
                'external_id' => '',
                'number' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'title' => 'Human Planet',
                'serie_id' => 17,
                'external_id' => '',
                'number' => 1,
            ),
        ));
        
        
    }
}

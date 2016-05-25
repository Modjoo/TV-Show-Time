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
                'title' => 'Band of Brothers',
                'serie_id' => 1,
                'external_id' => '',
                'number' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Breaking Bad',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Breaking Bad',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Breaking Bad',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Breaking Bad',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 4,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Breaking Bad',
                'serie_id' => 3,
                'external_id' => '',
                'number' => 5,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Game of Thrones',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Game of Thrones',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Game of Thrones',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 3,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Game of Thrones',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 4,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Game of Thrones',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 5,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Game of Thrones',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 6,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Game of Thrones',
                'serie_id' => 4,
                'external_id' => '',
                'number' => 7,
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'The Wire',
                'serie_id' => 5,
                'external_id' => '',
                'number' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'The Wire',
                'serie_id' => 5,
                'external_id' => '',
                'number' => 2,
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'The Wire',
                'serie_id' => 5,
                'external_id' => '',
                'number' => 3,
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'The Wire',
                'serie_id' => 5,
                'external_id' => '',
                'number' => 4,
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'The Wire',
                'serie_id' => 5,
                'external_id' => '',
                'number' => 5,
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Cosmos: A Spacetime Odyssey',
                'serie_id' => 6,
                'external_id' => '',
                'number' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'Cosmos',
                'serie_id' => 7,
                'external_id' => '',
                'number' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'Rick and Morty',
                'serie_id' => 8,
                'external_id' => '',
                'number' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'Rick and Morty',
                'serie_id' => 8,
                'external_id' => '',
                'number' => 2,
            ),
            22 => 
            array (
                'id' => 23,
                'title' => 'Rick and Morty',
                'serie_id' => 8,
                'external_id' => '',
                'number' => 3,
            ),
            23 => 
            array (
                'id' => 24,
                'title' => 'The Civil War',
                'serie_id' => 9,
                'external_id' => '',
                'number' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'title' => 'The Sopranos',
                'serie_id' => 10,
                'external_id' => '',
                'number' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'title' => 'The Sopranos',
                'serie_id' => 10,
                'external_id' => '',
                'number' => 2,
            ),
            26 => 
            array (
                'id' => 27,
                'title' => 'The Sopranos',
                'serie_id' => 10,
                'external_id' => '',
                'number' => 3,
            ),
            27 => 
            array (
                'id' => 28,
                'title' => 'The Sopranos',
                'serie_id' => 10,
                'external_id' => '',
                'number' => 4,
            ),
            28 => 
            array (
                'id' => 29,
                'title' => 'The Sopranos',
                'serie_id' => 10,
                'external_id' => '',
                'number' => 5,
            ),
            29 => 
            array (
                'id' => 30,
                'title' => 'The Sopranos',
                'serie_id' => 10,
                'external_id' => '',
                'number' => 6,
            ),
            30 => 
            array (
                'id' => 31,
                'title' => 'The World at War',
                'serie_id' => 12,
                'external_id' => '',
                'number' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'title' => 'Avatar: The Last Airbender',
                'serie_id' => 14,
                'external_id' => '',
                'number' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'title' => 'Avatar: The Last Airbender',
                'serie_id' => 14,
                'external_id' => '',
                'number' => 2,
            ),
            33 => 
            array (
                'id' => 34,
                'title' => 'Avatar: The Last Airbender',
                'serie_id' => 14,
                'external_id' => '',
                'number' => 3,
            ),
            34 => 
            array (
                'id' => 35,
                'title' => 'Last Week Tonight with John Oliver',
                'serie_id' => 15,
                'external_id' => '',
                'number' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'title' => 'Last Week Tonight with John Oliver',
                'serie_id' => 15,
                'external_id' => '',
                'number' => 2,
            ),
            36 => 
            array (
                'id' => 37,
                'title' => 'Last Week Tonight with John Oliver',
                'serie_id' => 15,
                'external_id' => '',
                'number' => 3,
            ),
            37 => 
            array (
                'id' => 38,
                'title' => 'True Detective',
                'serie_id' => 16,
                'external_id' => '',
                'number' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'title' => 'True Detective',
                'serie_id' => 16,
                'external_id' => '',
                'number' => 2,
            ),
            39 => 
            array (
                'id' => 40,
                'title' => 'Firefly',
                'serie_id' => 17,
                'external_id' => '',
                'number' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'title' => 'Human Planet',
                'serie_id' => 18,
                'external_id' => '',
                'number' => 1,
            ),
        ));
        
        
    }
}

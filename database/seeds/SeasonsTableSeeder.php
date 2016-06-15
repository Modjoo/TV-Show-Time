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
            41 => 
            array (
                'id' => 42,
                'title' => 'Marco Polo',
                'serie_id' => 20,
                'external_id' => '',
                'number' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'title' => 'Marco Polo',
                'serie_id' => 20,
                'external_id' => '',
                'number' => 2,
            ),
            43 => 
            array (
                'id' => 44,
                'title' => 'Magical Girl Lyrical Nanoha',
                'serie_id' => 31,
                'external_id' => '',
                'number' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'title' => 'Arrow',
                'serie_id' => 40,
                'external_id' => '',
                'number' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'title' => 'Arrow',
                'serie_id' => 40,
                'external_id' => '',
                'number' => 2,
            ),
            46 => 
            array (
                'id' => 47,
                'title' => 'Arrow',
                'serie_id' => 40,
                'external_id' => '',
                'number' => 3,
            ),
            47 => 
            array (
                'id' => 48,
                'title' => 'Arrow',
                'serie_id' => 40,
                'external_id' => '',
                'number' => 4,
            ),
            48 => 
            array (
                'id' => 49,
                'title' => 'Arrow',
                'serie_id' => 40,
                'external_id' => '',
                'number' => 5,
            ),
            49 => 
            array (
                'id' => 50,
                'title' => 'Once Upon a Time',
                'serie_id' => 45,
                'external_id' => '',
                'number' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'title' => 'Once Upon a Time',
                'serie_id' => 45,
                'external_id' => '',
                'number' => 2,
            ),
            51 => 
            array (
                'id' => 52,
                'title' => 'Once Upon a Time',
                'serie_id' => 45,
                'external_id' => '',
                'number' => 3,
            ),
            52 => 
            array (
                'id' => 53,
                'title' => 'Once Upon a Time',
                'serie_id' => 45,
                'external_id' => '',
                'number' => 4,
            ),
            53 => 
            array (
                'id' => 54,
                'title' => 'Once Upon a Time',
                'serie_id' => 45,
                'external_id' => '',
                'number' => 5,
            ),
            54 => 
            array (
                'id' => 55,
                'title' => 'Once Upon a Time',
                'serie_id' => 45,
                'external_id' => '',
                'number' => 6,
            ),
            55 => 
            array (
                'id' => 56,
                'title' => 'Sons of Anarchy',
                'serie_id' => 44,
                'external_id' => '',
                'number' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'title' => 'Sons of Anarchy',
                'serie_id' => 44,
                'external_id' => '',
                'number' => 2,
            ),
            57 => 
            array (
                'id' => 58,
                'title' => 'Sons of Anarchy',
                'serie_id' => 44,
                'external_id' => '',
                'number' => 3,
            ),
            58 => 
            array (
                'id' => 59,
                'title' => 'Sons of Anarchy',
                'serie_id' => 44,
                'external_id' => '',
                'number' => 4,
            ),
            59 => 
            array (
                'id' => 60,
                'title' => 'Sons of Anarchy',
                'serie_id' => 44,
                'external_id' => '',
                'number' => 5,
            ),
            60 => 
            array (
                'id' => 61,
                'title' => 'Sons of Anarchy',
                'serie_id' => 44,
                'external_id' => '',
                'number' => 6,
            ),
            61 => 
            array (
                'id' => 62,
                'title' => 'Sons of Anarchy',
                'serie_id' => 44,
                'external_id' => '',
                'number' => 7,
            ),
            62 => 
            array (
                'id' => 63,
                'title' => 'Vikings',
                'serie_id' => 49,
                'external_id' => '',
                'number' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'title' => 'Vikings',
                'serie_id' => 49,
                'external_id' => '',
                'number' => 2,
            ),
            64 => 
            array (
                'id' => 65,
                'title' => 'Vikings',
                'serie_id' => 49,
                'external_id' => '',
                'number' => 3,
            ),
            65 => 
            array (
                'id' => 66,
                'title' => 'Vikings',
                'serie_id' => 49,
                'external_id' => '',
                'number' => 4,
            ),
            66 => 
            array (
                'id' => 67,
                'title' => 'Vikings',
                'serie_id' => 49,
                'external_id' => '',
                'number' => 5,
            ),
            67 => 
            array (
                'id' => 68,
                'title' => 'The Blacklist',
                'serie_id' => 59,
                'external_id' => '',
                'number' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'title' => 'The Blacklist',
                'serie_id' => 59,
                'external_id' => '',
                'number' => 2,
            ),
            69 => 
            array (
                'id' => 70,
                'title' => 'The Blacklist',
                'serie_id' => 59,
                'external_id' => '',
                'number' => 3,
            ),
            70 => 
            array (
                'id' => 71,
                'title' => 'The Blacklist',
                'serie_id' => 59,
                'external_id' => '',
                'number' => 4,
            ),
        ));
        
        
    }
}

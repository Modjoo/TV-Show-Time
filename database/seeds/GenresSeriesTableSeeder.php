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
                'genre_id' => 7,
            ),
            7 => 
            array (
                'id' => 8,
                'serie_id' => 3,
                'genre_id' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'serie_id' => 3,
                'genre_id' => 8,
            ),
            9 => 
            array (
                'id' => 10,
                'serie_id' => 4,
                'genre_id' => 5,
            ),
            10 => 
            array (
                'id' => 11,
                'serie_id' => 4,
                'genre_id' => 2,
            ),
            11 => 
            array (
                'id' => 12,
                'serie_id' => 4,
                'genre_id' => 9,
            ),
            12 => 
            array (
                'id' => 13,
                'serie_id' => 5,
                'genre_id' => 7,
            ),
            13 => 
            array (
                'id' => 14,
                'serie_id' => 5,
                'genre_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'serie_id' => 5,
                'genre_id' => 8,
            ),
            15 => 
            array (
                'id' => 16,
                'serie_id' => 6,
                'genre_id' => 10,
            ),
            16 => 
            array (
                'id' => 17,
                'serie_id' => 7,
                'genre_id' => 10,
            ),
            17 => 
            array (
                'id' => 18,
                'serie_id' => 8,
                'genre_id' => 4,
            ),
            18 => 
            array (
                'id' => 19,
                'serie_id' => 8,
                'genre_id' => 5,
            ),
            19 => 
            array (
                'id' => 20,
                'serie_id' => 8,
                'genre_id' => 6,
            ),
            20 => 
            array (
                'id' => 21,
                'serie_id' => 9,
                'genre_id' => 10,
            ),
            21 => 
            array (
                'id' => 22,
                'serie_id' => 9,
                'genre_id' => 3,
            ),
            22 => 
            array (
                'id' => 23,
                'serie_id' => 9,
                'genre_id' => 11,
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
                'genre_id' => 2,
            ),
            25 => 
            array (
                'id' => 26,
                'serie_id' => 11,
                'genre_id' => 5,
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
                'genre_id' => 12,
            ),
            28 => 
            array (
                'id' => 29,
                'serie_id' => 12,
                'genre_id' => 10,
            ),
            29 => 
            array (
                'id' => 30,
                'serie_id' => 12,
                'genre_id' => 3,
            ),
            30 => 
            array (
                'id' => 31,
                'serie_id' => 12,
                'genre_id' => 11,
            ),
            31 => 
            array (
                'id' => 32,
                'serie_id' => 13,
                'genre_id' => 6,
            ),
            32 => 
            array (
                'id' => 33,
                'serie_id' => 13,
                'genre_id' => 7,
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
                'genre_id' => 4,
            ),
            35 => 
            array (
                'id' => 36,
                'serie_id' => 14,
                'genre_id' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'serie_id' => 14,
                'genre_id' => 5,
            ),
            37 => 
            array (
                'id' => 38,
                'serie_id' => 15,
                'genre_id' => 6,
            ),
            38 => 
            array (
                'id' => 39,
                'serie_id' => 15,
                'genre_id' => 13,
            ),
            39 => 
            array (
                'id' => 40,
                'serie_id' => 15,
                'genre_id' => 14,
            ),
            40 => 
            array (
                'id' => 41,
                'serie_id' => 16,
                'genre_id' => 7,
            ),
            41 => 
            array (
                'id' => 42,
                'serie_id' => 16,
                'genre_id' => 2,
            ),
            42 => 
            array (
                'id' => 43,
                'serie_id' => 16,
                'genre_id' => 12,
            ),
            43 => 
            array (
                'id' => 44,
                'serie_id' => 17,
                'genre_id' => 5,
            ),
            44 => 
            array (
                'id' => 45,
                'serie_id' => 17,
                'genre_id' => 2,
            ),
            45 => 
            array (
                'id' => 46,
                'serie_id' => 17,
                'genre_id' => 15,
            ),
            46 => 
            array (
                'id' => 47,
                'serie_id' => 18,
                'genre_id' => 10,
            ),
            47 => 
            array (
                'id' => 48,
                'serie_id' => 19,
                'genre_id' => 16,
            ),
            48 => 
            array (
                'id' => 49,
                'serie_id' => 20,
                'genre_id' => 5,
            ),
            49 => 
            array (
                'id' => 50,
                'serie_id' => 20,
                'genre_id' => 2,
            ),
            50 => 
            array (
                'id' => 51,
                'serie_id' => 20,
                'genre_id' => 3,
            ),
            51 => 
            array (
                'id' => 52,
                'serie_id' => 21,
                'genre_id' => 5,
            ),
            52 => 
            array (
                'id' => 53,
                'serie_id' => 21,
                'genre_id' => 17,
            ),
            53 => 
            array (
                'id' => 54,
                'serie_id' => 21,
                'genre_id' => 2,
            ),
            54 => 
            array (
                'id' => 55,
                'serie_id' => 22,
                'genre_id' => 2,
            ),
            55 => 
            array (
                'id' => 56,
                'serie_id' => 23,
                'genre_id' => 4,
            ),
            56 => 
            array (
                'id' => 57,
                'serie_id' => 23,
                'genre_id' => 5,
            ),
            57 => 
            array (
                'id' => 58,
                'serie_id' => 23,
                'genre_id' => 18,
            ),
            58 => 
            array (
                'id' => 59,
                'serie_id' => 24,
                'genre_id' => 4,
            ),
            59 => 
            array (
                'id' => 60,
                'serie_id' => 25,
                'genre_id' => 5,
            ),
            60 => 
            array (
                'id' => 61,
                'serie_id' => 25,
                'genre_id' => 18,
            ),
            61 => 
            array (
                'id' => 62,
                'serie_id' => 26,
                'genre_id' => 10,
            ),
            62 => 
            array (
                'id' => 63,
                'serie_id' => 27,
                'genre_id' => 19,
            ),
            63 => 
            array (
                'id' => 64,
                'serie_id' => 27,
                'genre_id' => 6,
            ),
            64 => 
            array (
                'id' => 65,
                'serie_id' => 28,
                'genre_id' => 10,
            ),
            65 => 
            array (
                'id' => 66,
                'serie_id' => 29,
                'genre_id' => 20,
            ),
            66 => 
            array (
                'id' => 67,
                'serie_id' => 30,
                'genre_id' => 6,
            ),
            67 => 
            array (
                'id' => 68,
                'serie_id' => 31,
                'genre_id' => 4,
            ),
            68 => 
            array (
                'id' => 69,
                'serie_id' => 31,
                'genre_id' => 9,
            ),
            69 => 
            array (
                'id' => 70,
                'serie_id' => 32,
                'genre_id' => 2,
            ),
            70 => 
            array (
                'id' => 71,
                'serie_id' => 32,
                'genre_id' => 21,
            ),
            71 => 
            array (
                'id' => 72,
                'serie_id' => 33,
                'genre_id' => 4,
            ),
            72 => 
            array (
                'id' => 73,
                'serie_id' => 34,
                'genre_id' => 4,
            ),
            73 => 
            array (
                'id' => 74,
                'serie_id' => 35,
                'genre_id' => 6,
            ),
            74 => 
            array (
                'id' => 75,
                'serie_id' => 36,
                'genre_id' => 4,
            ),
            75 => 
            array (
                'id' => 76,
                'serie_id' => 37,
                'genre_id' => 6,
            ),
            76 => 
            array (
                'id' => 77,
                'serie_id' => 37,
                'genre_id' => 15,
            ),
            77 => 
            array (
                'id' => 78,
                'serie_id' => 38,
                'genre_id' => 20,
            ),
            78 => 
            array (
                'id' => 79,
                'serie_id' => 39,
                'genre_id' => 6,
            ),
            79 => 
            array (
                'id' => 80,
                'serie_id' => 40,
                'genre_id' => 1,
            ),
            80 => 
            array (
                'id' => 81,
                'serie_id' => 40,
                'genre_id' => 5,
            ),
            81 => 
            array (
                'id' => 82,
                'serie_id' => 40,
                'genre_id' => 7,
            ),
            82 => 
            array (
                'id' => 83,
                'serie_id' => 41,
                'genre_id' => 6,
            ),
            83 => 
            array (
                'id' => 84,
                'serie_id' => 42,
                'genre_id' => 6,
            ),
            84 => 
            array (
                'id' => 85,
                'serie_id' => 43,
                'genre_id' => 2,
            ),
            85 => 
            array (
                'id' => 86,
                'serie_id' => 43,
                'genre_id' => 22,
            ),
            86 => 
            array (
                'id' => 87,
                'serie_id' => 43,
                'genre_id' => 8,
            ),
            87 => 
            array (
                'id' => 88,
                'serie_id' => 44,
                'genre_id' => 7,
            ),
            88 => 
            array (
                'id' => 89,
                'serie_id' => 44,
                'genre_id' => 2,
            ),
            89 => 
            array (
                'id' => 90,
                'serie_id' => 44,
                'genre_id' => 8,
            ),
            90 => 
            array (
                'id' => 91,
                'serie_id' => 45,
                'genre_id' => 5,
            ),
            91 => 
            array (
                'id' => 92,
                'serie_id' => 45,
                'genre_id' => 9,
            ),
            92 => 
            array (
                'id' => 93,
                'serie_id' => 45,
                'genre_id' => 21,
            ),
            93 => 
            array (
                'id' => 94,
                'serie_id' => 46,
                'genre_id' => 2,
            ),
            94 => 
            array (
                'id' => 95,
                'serie_id' => 46,
                'genre_id' => 21,
            ),
            95 => 
            array (
                'id' => 96,
                'serie_id' => 47,
                'genre_id' => 1,
            ),
            96 => 
            array (
                'id' => 97,
                'serie_id' => 47,
                'genre_id' => 2,
            ),
            97 => 
            array (
                'id' => 98,
                'serie_id' => 47,
                'genre_id' => 15,
            ),
            98 => 
            array (
                'id' => 99,
                'serie_id' => 48,
                'genre_id' => 6,
            ),
            99 => 
            array (
                'id' => 100,
                'serie_id' => 49,
                'genre_id' => 1,
            ),
            100 => 
            array (
                'id' => 101,
                'serie_id' => 49,
                'genre_id' => 2,
            ),
            101 => 
            array (
                'id' => 102,
                'serie_id' => 49,
                'genre_id' => 3,
            ),
            102 => 
            array (
                'id' => 103,
                'serie_id' => 50,
                'genre_id' => 4,
            ),
            103 => 
            array (
                'id' => 104,
                'serie_id' => 50,
                'genre_id' => 5,
            ),
            104 => 
            array (
                'id' => 105,
                'serie_id' => 51,
                'genre_id' => 1,
            ),
            105 => 
            array (
                'id' => 106,
                'serie_id' => 51,
                'genre_id' => 2,
            ),
            106 => 
            array (
                'id' => 107,
                'serie_id' => 51,
                'genre_id' => 3,
            ),
            107 => 
            array (
                'id' => 108,
                'serie_id' => 52,
                'genre_id' => 23,
            ),
            108 => 
            array (
                'id' => 109,
                'serie_id' => 53,
                'genre_id' => 10,
            ),
            109 => 
            array (
                'id' => 110,
                'serie_id' => 54,
                'genre_id' => 10,
            ),
            110 => 
            array (
                'id' => 111,
                'serie_id' => 55,
                'genre_id' => 5,
            ),
            111 => 
            array (
                'id' => 112,
                'serie_id' => 56,
                'genre_id' => 6,
            ),
            112 => 
            array (
                'id' => 113,
                'serie_id' => 57,
                'genre_id' => 4,
            ),
            113 => 
            array (
                'id' => 114,
                'serie_id' => 58,
                'genre_id' => 6,
            ),
            114 => 
            array (
                'id' => 115,
                'serie_id' => 58,
                'genre_id' => 14,
            ),
            115 => 
            array (
                'id' => 116,
                'serie_id' => 59,
                'genre_id' => 7,
            ),
            116 => 
            array (
                'id' => 117,
                'serie_id' => 59,
                'genre_id' => 2,
            ),
            117 => 
            array (
                'id' => 118,
                'serie_id' => 59,
                'genre_id' => 12,
            ),
            118 => 
            array (
                'id' => 119,
                'serie_id' => 60,
                'genre_id' => 7,
            ),
            119 => 
            array (
                'id' => 120,
                'serie_id' => 60,
                'genre_id' => 2,
            ),
            120 => 
            array (
                'id' => 121,
                'serie_id' => 61,
                'genre_id' => 3,
            ),
            121 => 
            array (
                'id' => 122,
                'serie_id' => 62,
                'genre_id' => 10,
            ),
            122 => 
            array (
                'id' => 123,
                'serie_id' => 63,
                'genre_id' => 1,
            ),
        ));
        
        
    }
}

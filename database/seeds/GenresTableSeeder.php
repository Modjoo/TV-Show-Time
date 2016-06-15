<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genres')->delete();
        
        \DB::table('genres')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Action',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Drama',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'History',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Animation',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Adventure',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Comedy',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Crime',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Thriller',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Fantasy',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Documentary',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'War',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Mystery',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'News',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Talk-Show',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Sci-Fi',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Music',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Biography',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Family',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Short',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'N/A',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Romance',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Horror',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Reality-TV',
            ),
        ));
        
        
    }
}

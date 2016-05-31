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
                'name' => 'Animation',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Adventure',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Comedy',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Crime',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Drama',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Thriller',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Fantasy',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Documentary',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'History',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'War',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Mystery',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Action',
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
        ));
        
        
    }
}

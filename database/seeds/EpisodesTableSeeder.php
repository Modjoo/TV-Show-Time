<?php

use Illuminate\Database\Seeder;

class EpisodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('episodes')->delete();
        
        \DB::table('episodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Pilot',
                'serie_id' => 5,
                'duration' => NULL,
                'description' => NULL,
                'number' => 1,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 1,
                'external_id' => 'tt0959621',
                'isfilled' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Cat\'s in the Bag...',
                'serie_id' => 5,
                'duration' => NULL,
                'description' => NULL,
                'number' => 2,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 1,
                'external_id' => 'tt1054724',
                'isfilled' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '...And the Bag\'s in the River',
                'serie_id' => 5,
                'duration' => NULL,
                'description' => NULL,
                'number' => 3,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 1,
                'external_id' => 'tt1054725',
                'isfilled' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Cancer Man',
                'serie_id' => 7,
                'duration' => NULL,
                'description' => NULL,
                'number' => 4,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 1,
                'external_id' => 'tt1054726',
                'isfilled' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Gray Matter',
                'serie_id' => 7,
                'duration' => NULL,
                'description' => NULL,
                'number' => 5,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 1,
                'external_id' => 'tt1054727',
                'isfilled' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Crazy Handful of Nothin\'',
                'serie_id' => 7,
                'duration' => NULL,
                'description' => NULL,
                'number' => 6,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 1,
                'external_id' => 'tt1054728',
                'isfilled' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'A No-Rough-Stuff-Type Deal',
                'serie_id' => 7,
                'duration' => NULL,
                'description' => NULL,
                'number' => 7,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 1,
                'external_id' => 'tt1054729',
                'isfilled' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Seven Thirty-Seven',
                'serie_id' => 7,
                'duration' => NULL,
                'description' => NULL,
                'number' => 1,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 2,
                'external_id' => 'tt1232244',
                'isfilled' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Grilled',
                'serie_id' => 8,
                'duration' => NULL,
                'description' => NULL,
                'number' => 2,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 2,
                'external_id' => 'tt1232249',
                'isfilled' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Bit by a Dead Bee',
                'serie_id' => 8,
                'duration' => NULL,
                'description' => NULL,
                'number' => 3,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 2,
                'external_id' => 'tt1232250',
                'isfilled' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Down',
                'serie_id' => 8,
                'duration' => NULL,
                'description' => NULL,
                'number' => 4,
                'release_date' => NULL,
                'cover_img_url' => NULL,
                'season_id' => 2,
                'external_id' => 'tt1232251',
                'isfilled' => 1,
            )
        ));
        
        
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pseudo' => 'Modjo',
                'password' => '$2y$10$OfMnue8WgTwHNTK04CnG0.h.QYN0Nk0Ewit4Q0s8H2xS/OT01fAcO',
                'avatar_img' => 'http://orig15.deviantart.net/fe3d/f/2015/350/6/a/saitama__one_punch_man__by_n3v3rsenpai-d9kbkij.png',
                'birthday' => '1999-07-25',
                'gender' => 'Homme',
            ),
            1 => 
            array (
                'id' => 2,
                'pseudo' => 'Hacker',
                'password' => '$2y$10$HojHaWAY3cQoN8Kh5vdQ6ekrOOCATB5g6pfO4Q7ns1D.Gv1fuchGm',
                'avatar_img' => NULL,
                'birthday' => '1750-07-19',
                'gender' => 'Femme',
            ),
            2 => 
            array (
                'id' => 3,
                'pseudo' => 'Manu',
                'password' => '$2y$10$JS1HKMo/bPkdZyVoO3nB7OFNb0t8n//aW1GNP0zOErC4s..Uhvpjq',
                'avatar_img' => 'http://www.slate.com/content/dam/slate/blogs/bad_astronomy/2014/11/08/interstellar_movie_blackhole_354.jpg.CROP.original-original.jpg',
                'birthday' => '1970-01-01',
                'gender' => 'Femme',
            ),
        ));
        
        
    }
}

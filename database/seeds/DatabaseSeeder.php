<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        
        $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(SeriesTableSeeder::class);
        $this->call(GenresSeriesTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(EpisodesTableSeeder::class);
        $this->call(UsersSeriesTableSeeder::class);
        $this->call(EpisodesUsersTableSeeder::class);


    }
}

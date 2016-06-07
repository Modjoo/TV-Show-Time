<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = array(
            ['pseudo' => 'Modjo', 'password' => Hash::make('secret'), 'birthday' => \Carbon\Carbon::createFromDate(1999,07,25)->toDateTimeString(), 'gender' => 'Homme'],
            ['pseudo' => 'Hacker', 'password' => Hash::make('secret'), 'birthday' => \Carbon\Carbon::createFromDate(1750,07,19)->toDateTimeString(), 'gender' => 'Femme'],
            ['pseudo' => 'Manu', 'password' => Hash::make('blabla'), 'birthday' => \Carbon\Carbon::createFromDate(1750,07,19)->toDateTimeString(), 'gender' => 'Femme']
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

    }
}

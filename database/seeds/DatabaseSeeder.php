<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Abd. Asis";
        $user->email = "id.abdasis@gmail.com";
        $user->password = Hash::make('*#A5iSd3V%$');
        $user->save();
    }
}

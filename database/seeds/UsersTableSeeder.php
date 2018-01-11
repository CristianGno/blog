<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User();
        $user->name = "Cristian";
        $user->email = "cristian.galeano1913@gmail.com";
        $user->password = bcrypt("123456");
        $user->save();

        $user = new User();
        $user->name = "Cristian Galeano";
        $user->email = "cristianlistasseguras@gmail.com";
        $user->password = bcrypt("123456");
        $user->save();

    }
}

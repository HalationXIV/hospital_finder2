<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User;

        $user->name = 'konohana_lucia';
        $user->email = 'konohana23@rewrite.com';
        $user->password = bcrypt('konohana_lucia');
        $user->role = 'admin';

        $user->save();

    }
}

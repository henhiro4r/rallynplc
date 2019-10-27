<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Henry';
        $user->username = 'admhenry';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 1; #admin
        $user->save();

        $user = new User();
        $user->name = 'Henry';
        $user->username = 'lohenry';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 2; #lo
        $user->save();

        $user = new User();
        $user->name = 'Henry';
        $user->username = 'parhenry';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 3; #participant
        $user->save();
    }
}

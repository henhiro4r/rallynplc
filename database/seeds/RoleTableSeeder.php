<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "Admin";
        $role->description = "Administrator (Developer)";
        $role->save();

        $role = new Role();
        $role->name = "Liaison";
        $role->description = "LO at game posts";
        $role->save();

        $role = new Role();
        $role->name = "Participant";
        $role->description = "Participant of Rally NPLC";
        $role->save();
    }
}

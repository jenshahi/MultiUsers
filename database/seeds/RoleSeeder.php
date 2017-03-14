<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role= new Role();
        $role_user->name = 'Free';
        $role_user->description = 'Free User of the page';
        $role_user->save();

        $role_user= new Role();
        $role_user->name = 'Gold';
        $role_user->description = 'Gold Users';
        $role_user->save();

        $role_user= new Role();
        $role_user->name = 'Premium';
        $role_user->description = 'Premium Users';
        $role_user->save();
    }
}

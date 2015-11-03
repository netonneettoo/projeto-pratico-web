<?php

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
        $admin = new \App\User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('adminfacevol');
        $admin->save();

        $roleAdmin = \App\Role::where('name', 'admin')->first();
        $admin->attachRole($roleAdmin);
    }
}

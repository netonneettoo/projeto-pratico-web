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
        $admin->attachRole(\App\Role::where('name', 'admin')->first());

        factory(App\User::class, 5)->create()->each(function($obj) {
            $obj->save();
            $obj->attachRole(\App\Role::where('name', 'librarian')->first());
        });

        factory(App\User::class, 5)->create()->each(function($obj) {
            $obj->save();
            $obj->attachRole(\App\Role::where('name', 'employee')->first());
        });

        factory(App\User::class, 5)->create()->each(function($obj) {
            $obj->save();
            $obj->attachRole(\App\Role::where('name', 'teacher')->first());
        });

        factory(App\User::class, 5)->create()->each(function($obj) {
            $obj->save();
            $obj->attachRole(\App\Role::where('name', 'student')->first());
        });
    }
}

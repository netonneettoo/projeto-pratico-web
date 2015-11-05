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
        $roleAdmin = \App\Role::where('name', 'admin')->first();
        $roleLibrarian = \App\Role::where('name', 'librarian')->first();
        $roleEmployee = \App\Role::where('name', 'employee')->first();
        $roleTeacher = \App\Role::where('name', 'teacher')->first();
        $roleStudent = \App\Role::where('name', 'student')->first();

        $admin = new \App\User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('adminfacevol');
        $admin->save();
        $admin->attachRole($roleAdmin);

        $users = factory(App\User::class, 5)->make();
        foreach($users as $u) {
            $u->save();
            $u->attachRole($roleLibrarian);
        }

        $users = factory(App\User::class, 5)->make();
        foreach($users as $u) {
            $u->save();
            $u->attachRole($roleEmployee);
        }

        $users = factory(App\User::class, 5)->make();
        foreach($users as $u) {
            $u->save();
            $u->attachRole($roleTeacher);
        }

        $users = factory(App\User::class, 5)->make();
        foreach($users as $u) {
            $u->save();
            $u->attachRole($roleStudent);
        }
    }
}

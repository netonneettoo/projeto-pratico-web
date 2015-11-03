<?php

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
        $admin = new \App\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description  = 'User is allowed to manage and edit other users';
        $admin->save();

        $librarian = new \App\Role();
        $librarian->name         = 'librarian';
        $librarian->display_name = 'User Librarian';
        $librarian->description  = 'User is allowed to manage the library';
        $librarian->save();

        $teacher = new \App\Role();
        $teacher->name         = 'teacher';
        $teacher->display_name = 'User Teacher';
        $teacher->description  = 'User is allowed to rent, to reserve and to return the library copies';
        $teacher->save();

        $student = new \App\Role();
        $student->name         = 'student';
        $student->display_name = 'User Student';
        $student->description  = 'User is allowed to rent, to reserve and to return the library copies';
        $student->save();
    }
}

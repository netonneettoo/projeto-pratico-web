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

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = 'librarian-' . $i;
            $user->email = 'librarian-' . $i . '@facevol.edu.br';
            $user->password = bcrypt('librarianfacevol');
            $user->save();
            $user->attachRole(\App\Role::where('name', 'librarian')->first());
        }

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = 'employee-' . $i;
            $user->email = 'employee-' . $i . '@facevol.edu.br';
            $user->password = bcrypt('employeefacevol');
            $user->save();
            $user->attachRole(\App\Role::where('name', 'employee')->first());
        }

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = 'teacher-' . $i;
            $user->email = 'teacher-' . $i . '@facevol.edu.br';
            $user->password = bcrypt('teacherfacevol');
            $user->save();
            $user->attachRole(\App\Role::where('name', 'teacher')->first());
        }

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = 'student-' . $i;
            $user->email = 'student-' . $i . '@facevol.edu.br';
            $user->password = bcrypt('studentfacevol');
            $user->save();
            $user->attachRole(\App\Role::where('name', 'student')->first());
        }
    }
}

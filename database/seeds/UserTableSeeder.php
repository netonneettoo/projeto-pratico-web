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
            $admin = new \App\User();
            $admin->name = \App\Services\Util::generateName(10);
            $admin->email = \App\Services\Util::generateName(10) . '@facevol.edu.br';
            $admin->password = bcrypt('librarian');
            $admin->save();
            $admin->attachRole(\App\Role::where('name', 'librarian')->first());
        }

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = \App\Services\Util::generateName(10);
            $user->email = \App\Services\Util::generateName(10) . '@facevol.edu.br';
            $user->password = bcrypt('employee');
            $user->save();
            $user->attachRole(\App\Role::where('name', 'employee')->first());
        }

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = \App\Services\Util::generateName(10);
            $user->email = \App\Services\Util::generateName(10) . '@facevol.edu.br';
            $user->password = bcrypt('teacher');
            $user->save();
            $user->attachRole(\App\Role::where('name', 'teacher')->first());
        }

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = \App\Services\Util::generateName(10);
            $user->email = \App\Services\Util::generateName(10) . '@facevol.edu.br';
            $user->password = bcrypt('student');
            $user->save();
            $user->attachRole(\App\Role::where('name', 'student')->first());
        }
    }
}

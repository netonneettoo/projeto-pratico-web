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
        // roles

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

        $employee = new \App\Role();
        $employee->name         = 'employee';
        $employee->display_name = 'User Employee';
        $employee->description  = 'User is allowed to rent, to reserve and to return the library copies';
        $employee->save();

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

        // permissions

        $toLoan = new \App\Permission();
        $toLoan->name         = 'to-loan';
        $toLoan->display_name = 'To Loan';
        $toLoan->description  = 'To loan copies of works for students, teacher and employees';
        $toLoan->save();
        $librarian->attachPermission($toLoan);

        $toReserve = new \App\Permission();
        $toReserve->name         = 'to-reserve';
        $toReserve->display_name = 'To Reserve';
        $toReserve->description  = 'To reserve copies of works for students, teacher and employees';
        $toReserve->save();
        $librarian->attachPermission($toReserve);

        $toReturn = new \App\Permission();
        $toReturn->name         = 'to-return';
        $toReturn->display_name = 'To Return';
        $toReturn->description  = 'To return copies of works for students, teacher and employees';
        $toReturn->save();
        $librarian->attachPermission($toReturn);

        $toRenew = new \App\Permission();
        $toRenew->name          = 'to-renew';
        $toRenew->display_name  = 'To Renew';
        $toRenew->description   = 'To renew copies of works for students, teacher and employees';
        $toRenew->save();
        $librarian->attachPermission($toRenew);

        $addLibrarian = new \App\Permission();
        $addLibrarian->name         = 'add-librarian';
        $addLibrarian->display_name = 'Add Librarian';
        $addLibrarian->description  = 'Can add librarian user';
        $addLibrarian->save();
        $admin->attachPermission($addLibrarian);

        $addEmployee = new \App\Permission();
        $addEmployee->name         = 'add-employee';
        $addEmployee->display_name = 'Add Employee';
        $addEmployee->description  = 'Can add employee user';
        $addEmployee->save();
        $admin->attachPermission($addEmployee);

        $AddTeacher = new \App\Permission();
        $AddTeacher->name         = 'add-teacher';
        $AddTeacher->display_name = 'Add Teacher';
        $AddTeacher->description  = 'Can add teacher user';
        $AddTeacher->save();
        $admin->attachPermission($AddTeacher);

        $addStudent = new \App\Permission();
        $addStudent->name         = 'add-student';
        $addStudent->display_name = 'Add Student';
        $addStudent->description  = 'Can add student user';
        $addStudent->save();
        $admin->attachPermission($addStudent);
        $librarian->attachPermission($addStudent);

        $editLibrarian = new \App\Permission();
        $editLibrarian->name         = 'edit-librarian';
        $editLibrarian->display_name = 'Edit Librarian';
        $editLibrarian->description  = 'Can edit librarian user';
        $editLibrarian->save();
        $admin->attachPermission($editLibrarian);

        $editEmployee = new \App\Permission();
        $editEmployee->name         = 'edit-employee';
        $editEmployee->display_name = 'Edit Employee';
        $editEmployee->description  = 'Can edit employee user';
        $editEmployee->save();
        $admin->attachPermission($editEmployee);

        $editTeacher = new \App\Permission();
        $editTeacher->name         = 'edit-teacher';
        $editTeacher->display_name = 'Edit Teacher';
        $editTeacher->description  = 'Can edit teacher user';
        $editTeacher->save();
        $admin->attachPermission($editTeacher);

        $editStudent = new \App\Permission();
        $editStudent->name         = 'edit-student';
        $editStudent->display_name = 'Edit Student';
        $editStudent->description  = 'Can edit student user';
        $editStudent->save();
        $admin->attachPermission($editStudent);
        $librarian->attachPermission($editStudent);

        $editProfile = new \App\Permission();
        $editProfile->name         = 'edit-profile';
        $editProfile->display_name = 'Edit Profile';
        $editProfile->description  = 'Can edit your user profile';
        $editProfile->save();
        $admin->attachPermission($editProfile);
        $librarian->attachPermission($editProfile);
        $employee->attachPermission($editProfile);
        $teacher->attachPermission($editProfile);
        $student->attachPermission($editProfile);

        $maxThreeCopies = new \App\Permission();
        $maxThreeCopies->name         = 'max-three-copies';
        $maxThreeCopies->display_name = 'Max Three Copies';
        $maxThreeCopies->description  = 'Can catch loaned a maximum of three copies';
        $maxThreeCopies->save();
        $employee->attachPermission($maxThreeCopies);
        $student->attachPermission($maxThreeCopies);

        $maxFiveCopies = new \App\Permission();
        $maxFiveCopies->name         = 'max-five-copies';
        $maxFiveCopies->display_name = 'Max Copies Five';
        $maxFiveCopies->description  = 'Can catch loaned a maximum of five copies';
        $maxFiveCopies->save();
        $teacher->attachPermission($maxFiveCopies);

        $maxTenDays = new \App\Permission();
        $maxTenDays->name         = 'max-ten-days';
        $maxTenDays->display_name = 'Max Ten Days';
        $maxTenDays->description  = 'Can catch loaned by a maximum ten days';
        $maxTenDays->save();
        $employee->attachPermission($maxTenDays);
        $student->attachPermission($maxTenDays);

        $maxFifteenDays = new \App\Permission();
        $maxFifteenDays->name         = 'max-fifteen-days';
        $maxFifteenDays->display_name = 'Max Fifteen Days';
        $maxFifteenDays->description  = 'Can catch loaned by a maximum fifteen days';
        $maxFifteenDays->save();
        $teacher->attachPermission($maxFifteenDays);

        $requestRenewal = new \App\Permission();
        $requestRenewal->name         = 'request-renewal';
        $requestRenewal->display_name = 'Request Renewal';
        $requestRenewal->description  = 'Can request renewal of copies of works';
        $requestRenewal->save();
        $employee->attachPermission($requestRenewal);
        $teacher->attachPermission($requestRenewal);
        $student->attachPermission($requestRenewal);

        $requestReserve = new \App\Permission();
        $requestReserve->name         = 'request-reserve';
        $requestReserve->display_name = 'Request Reserve';
        $requestReserve->description  = 'Can request reserve of works';
        $requestReserve->save();
        $employee->attachPermission($requestReserve);
        $teacher->attachPermission($requestReserve);
        $student->attachPermission($requestReserve);
    }
}

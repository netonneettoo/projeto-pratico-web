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

        $student = new \App\Role();
        $student->name         = 'employee';
        $student->display_name = 'User Employee';
        $student->description  = 'User is allowed to rent, to reserve and to return the library copies';
        $student->save();

        // permissions

        $createPost = new \App\Permission();
        $createPost->name         = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description  = 'create new blog posts'; // optional
        $createPost->save();
//        $admin->attachPermission($createPost);

        /*

librarian
	pode realizar o emprestimo de exemplares a alunos, professores e funcionarios atraves do sistema [can-loan]
	pode realizar a reserva de exemplares a alunos, professores e funcionarios atraves do sistema [can-reserve]
	pode realizar a devolução de exemplares a alunos, professores e funcionarios atraves do sistema [can-return]
	pode realizar a renovacao de exemplares a alunos, professores e funcionarios atraves do sistema [can-renew]

admin
	pode cadastrar bibliotecarios atraves do sistema [can-add-librarian]
admin, librarian
	pode cadastrar funcionarios atraves do sistema [can-add-employee]
admin, librarian
	pode cadastrar professores atraves do sistema [can-add-teacher]
admin, librarian
	pode cadastrar estudantes atraves do sistema [can-add-student]

admin
	pode editar funcionarios [can-edit-employee]
admin, librarian
	pode editar professores [can-edit-teacher]
admin, librarian
	pode editar alunos [can-edit-student]
admin, librarian, employee, teacher, student
	pode editar seu próprio perfil [can-edit-profile]

student, employee
	pode alugar no maximo 3 livros [can-rent-three-copies]
teacher
	pode alugar no maximo 5 livros [can-rent-five-copies]

student, employee
	pode alugar cada exemplar por no maximo 10 dias [can-rent-ten-days]
teacher
	pode alugar cada exemplar por no maximo 30 dias [can-rent-thirty-days]

teacher, student, employee
	pode solicitar renovacao de exemplares (online) [can-request-renewal]
teacher, student, employee
	pode solicitar reserva de obras (online) [can-request-reserve]

         * */
    }
}

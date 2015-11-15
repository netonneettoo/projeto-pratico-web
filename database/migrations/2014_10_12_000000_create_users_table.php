<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            'users', function (Blueprint $table) {
            $table->increments('id');/*matricula*/
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone', 15)->nullable();
            $table->string('cellphone', 15)->nullable();;
            $table->string('password', 60);
            $table->string('city', 30)->nullable();
            $table->string('street', 60);
            $table->string('cep');
            $table->string('uf', 2);
            $table->enum('status', array(, ,  ));
            $table->rememberToken();
            $table->timestamps();

          /*CONSTRAINT co_pk_cod_user PRIMARY KEY(cod_usuario),
          *CONSTRAINT co_fk_cod_per FOREIGN KEY(id_permissao) REFERENCES tb_permissao(cod_permissao)*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

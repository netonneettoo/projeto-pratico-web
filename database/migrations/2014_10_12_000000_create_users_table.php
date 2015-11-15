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
            $table->mediumInteger('tel_fixo');
            $table->mediumInteger('tel_cel');
            $table->string('password', 60);
            $table->string('cidade', 30);
            $table->string('logradouro', 60);
            $table->string('cep');
            $table->char('uf');
            $table->boolean('status_financeiro');
            $table->rememberToken();
            $table->timestamps();
            $table->increments('id');
            $table->increments('id');

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

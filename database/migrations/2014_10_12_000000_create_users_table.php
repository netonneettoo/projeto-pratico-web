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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone', 15)->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->string('password', 60);
            $table->string('city', 30)->nullable();
            $table->string('street', 60)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('uf', 2)->nullable();
            $table->enum('status', array(1,2,3))->nullable();
            $table->rememberToken();
            $table->timestamps();
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

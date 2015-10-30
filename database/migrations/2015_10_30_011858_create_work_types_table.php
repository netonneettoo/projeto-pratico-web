<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * tb_tp_obra
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_types', function (Blueprint $table) {
            $table->increments('id'); //cod_tp_obra
            $table->string('description', 30)->nullable(); //tp_obra_nome
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
        Schema::drop('work_types');
    }
}

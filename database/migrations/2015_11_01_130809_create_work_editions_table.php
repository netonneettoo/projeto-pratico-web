<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * edicao_obra
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_editions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('work_id');
            $table->unsignedInteger('edition');
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('works');
            $table->unique(array('work_id', 'edition'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_editions');
    }
}

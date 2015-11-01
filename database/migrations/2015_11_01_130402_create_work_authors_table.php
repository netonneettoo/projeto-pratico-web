<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * autor_obra
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_authors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('work_id');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('work_id')->references('id')->on('works');
            $table->unique(array('author_id', 'work_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_authors');
    }
}

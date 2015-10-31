<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * genero_obra
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('work_id');
            $table->unsignedInteger('genre_id');
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('works');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->unique(array('work_id', 'genre_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_genres');
    }
}

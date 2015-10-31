<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * exemplar
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('work_id');
            $table->unsignedInteger('number');
            $table->enum('status', array('available', 'rented', 'reserved', 'unavailable'));
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('works');
            $table->unique(array('work_id', 'number'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('copies');
    }
}

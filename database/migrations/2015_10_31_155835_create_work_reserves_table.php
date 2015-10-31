<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * reserva_obra
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('work_id');
            $table->unsignedInteger('user_id');
            $table->timestamp('reserved_at');
            $table->timestamp('retrieved_at');
            $table->enum('status', array('active', 'inactive'));
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('works');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(array('work_id', 'user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_reserves');
    }
}

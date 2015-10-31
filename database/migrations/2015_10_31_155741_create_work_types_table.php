<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * tipos_obra
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
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

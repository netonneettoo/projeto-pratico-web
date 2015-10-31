<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * obra
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('publication_year', 4);
            $table->double('price', 6, 2);
            $table->string('isbn13');
            $table->unsignedInteger('publisher_id');
            $table->unsignedInteger('work_type_id');
            $table->enum('status', array('active', 'inactive'));
            $table->timestamps();

            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('work_type_id')->references('id')->on('work_types');
            $table->unique('isbn13');
            $table->unique('title');
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
        Schema::drop('works');
    }
}

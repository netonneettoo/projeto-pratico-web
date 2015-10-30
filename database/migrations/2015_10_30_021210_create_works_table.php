<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * tb_obras
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id'); //cod_obras

            $table->string('title', 150); //titulo
            $table->char('status', 1); //ob_status

            $table->unsignedInteger('work_type_id'); //id_tipo_obra
            $table->unsignedInteger('section_id'); //id_secao
            $table->unsignedInteger('publisher_id'); //id_editora
            $table->unsignedInteger('author_id'); //id_autor
            $table->unsignedInteger('copy_id'); //id_exemplar

            $table->foreign('work_type_id')->references('id')->on('work_types')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('work_types')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('work_types')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('work_types')->onDelete('cascade');
            $table->foreign('copy_id')->references('id')->on('work_types')->onDelete('cascade');

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
        Schema::drop('works');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * item_emprestimo
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('loan_id');
            $table->unsignedInteger('copy_id');
            $table->timestamp('return_prevision');
            $table->timestamp('returned_at')->nullable();
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
        Schema::drop('loan_items');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnLoanItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * devolucao_item_emprestimo
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_loan_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('loan_item_id');
            $table->timestamps();

            $table->foreign('loan_item_id')->references('id')->on('loan_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('return_loan_items');
    }
}

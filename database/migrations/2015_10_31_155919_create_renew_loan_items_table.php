<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenewLoanItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * renovar_item_emprestimo
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renew_loan_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('loan_item_id');
            $table->timestamp('return_prevision');
            $table->timestamp('renewed_at');
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
        Schema::drop('renew_loan_items');
    }
}

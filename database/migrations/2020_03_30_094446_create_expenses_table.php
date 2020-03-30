<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('expense_id');
            $table->string('title');
            $table->double('amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();

            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('currency_id')
                  ->references('currency_id')
                  ->on('currencies')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}

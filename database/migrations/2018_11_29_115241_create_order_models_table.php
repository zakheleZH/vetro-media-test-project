<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('foreign_currency_purchased');
            $table->double('exchange_rate',255,15);
            $table->double('surcharge_percentage',255,15);
            $table->double('amount_foreign_currency_purchased',255,15);
            $table->double('amount_paid_ZAR',255,15);
            $table->double('Amount_of_surcharge',255,15);
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
        Schema::dropIfExists('order_models');
    }
}

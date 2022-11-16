<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("id_product")->unsigned();
            $table->integer("id_order")->unsigned();
            $table->integer('qty');
            $table->double("amount");
            $table->double("total");


            $table->timestamps();
        });

        Schema::table('order_details', function (Blueprint $table){
            $table->foreign('id_product')->references('id') -> on ('coffee_products');
            $table->foreign('id_order')->references('id') -> on ('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};

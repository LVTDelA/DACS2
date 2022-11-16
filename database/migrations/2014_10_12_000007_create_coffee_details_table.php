<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffee_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("id_product")->unsigned();
            $table->string("type");

            $table->timestamps();
        });

        Schema::table('coffee_details', function (Blueprint $table){
            $table->foreign('id_product')->references('id') -> on ('coffee_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffee_details');
    }
};

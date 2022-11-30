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
        Schema::create('coffee_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("id_coffee_brand")->unsigned();
            $table->integer("id_coffee_category")->unsigned();
            $table->string("name");
            $table->string("content")->nullable();
            $table->text("description")->nullable();
            $table->integer("price");
            $table->integer("discount")->nullable();
            $table->string("weight")->nullable();

            $table->timestamps();
        });

       Schema::table('coffee_products', function (Blueprint $table){
           $table->foreign('id_coffee_brand')->references('id') -> on ('coffee_brands');
           $table->foreign('id_coffee_category')->references('id') -> on ('coffee_category');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffee_products');
    }
};

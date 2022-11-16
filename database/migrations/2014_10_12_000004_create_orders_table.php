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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("country");
            $table->string("street_address");
            $table->string("email")->nullable();
            $table->string("phone_number");
            $table->string('payment_type');
            $table->integer('status');

            $table->timestamps();
        });
//        Foreign Key
       Schema::table('orders', function (Blueprint $table){
           $table->foreign('user_id')->references('id') -> on ('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

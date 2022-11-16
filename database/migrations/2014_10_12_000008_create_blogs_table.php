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
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('us_id')->unsigned();
            $table->string("title");
            $table->string('subtitle')->nullable();
            $table->string("image");
            $table->string("content");

            $table->timestamps();
        });
        Schema::table('blogs', function (Blueprint $table){
            $table->foreign('us_id')->references('id') -> on ('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};

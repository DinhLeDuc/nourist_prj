<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('food_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id');
            $table->string('name', 150);
            $table->string('slug', 150);
            $table->string('language', 50);
            $table->Integer('price')->nullable();
            $table->text('note')->nullable();
            $table->text('recipe')->nullable();
            $table->text('introduction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('food_details');
    }
}

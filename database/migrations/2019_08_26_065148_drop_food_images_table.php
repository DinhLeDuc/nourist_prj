<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class DropFoodImagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::drop('food_images');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}

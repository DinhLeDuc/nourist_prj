<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnTableFoods extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->dropColumn(['foot_type_id', 'type_meal', 'name', 'name_en', 'price', 'introduction', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}

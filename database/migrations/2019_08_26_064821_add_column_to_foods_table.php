<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToFoodsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            Schema::table('foods', function (Blueprint $table) {
                $table->string('avatar')->after('user_id');
                $table->string('status', 50)->after('avatar')->default(FOOD_MEAL_PUBLIC);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->string('status');
        });
    }
}

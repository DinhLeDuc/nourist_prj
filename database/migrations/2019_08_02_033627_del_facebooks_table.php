<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DelFacebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('facebooks');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::create('facebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('fb_id')->unique();
            $table->string('fb_token')->unique();
            $table->timestamps();
        });
    }
}

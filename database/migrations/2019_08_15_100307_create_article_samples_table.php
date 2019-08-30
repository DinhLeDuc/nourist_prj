<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleSamplesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('article_samples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->string('avatar');
            $table->longText('content');
            $table->longText('content_preview')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('article_samples');
    }
}

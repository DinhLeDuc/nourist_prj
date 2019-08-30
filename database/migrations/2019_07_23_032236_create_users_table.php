<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->string('username', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('avatar')->default('/images/default_user.png');
            $table->string('fullname', 100)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('status')->default(USER_STATUS_VERIFY);
            $table->string('email_verify')->nullable();
            $table->string('social_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

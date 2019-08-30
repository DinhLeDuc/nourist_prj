<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateManagersTable.
 */
class CreateManagersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('managers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45);
            $table->string('username', 45)->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('role')->default(ROLE_MANAGER_ADMIN)->nullable();
            $table->string('status')->default(ADMIN_STATUS_INACTIVE)->nullable();
            $table->longText('note')->nullable();
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
		Schema::drop('managers');
	}
}

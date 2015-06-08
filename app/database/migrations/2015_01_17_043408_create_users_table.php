<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('full_name');
		    $table->string('ci');
		    $table->enum('gender', ['male', 'female'])->default('male');
		    $table->string('phone');
		    $table->string('email')->unique();
		    $table->string('password');
		    $table->enum('type', ['user', 'admin'])->default('user');

		    $table->string('remember_token')->nullable();
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

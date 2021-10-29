<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email', 100)->unique();
			$table->string('password');
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('avatar')->default('public/client/img/admin.png');
			$table->string('position')->default('Co-Founder');
			$table->text('desc')->nullable();
			$table->string('facebook')->nullable();
			$table->string('zalo')->nullable();
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
		Schema::dropIfExists('admins');
	}
}

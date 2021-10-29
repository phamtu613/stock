<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminIdToCartsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carts', function (Blueprint $table) {
			$table->unsignedBigInteger('admin_id')->nullable();
			$table->foreign('admin_id')->references('id')->on('admins');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carts', function (Blueprint $table) {
			// $table->dropadmin_id();
		});
	}
}

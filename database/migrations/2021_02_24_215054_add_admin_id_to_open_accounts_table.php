<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminIdToOpenAccountsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('open_accounts', function (Blueprint $table) {
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
		Schema::table('open_accounts', function (Blueprint $table) {
			$table->dropAdmin_id();
		});
	}
}

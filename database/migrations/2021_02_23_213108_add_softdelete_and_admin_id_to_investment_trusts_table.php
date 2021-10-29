<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeleteAndAdminIdToInvestmentTrustsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('investment_trusts', function (Blueprint $table) {
			$table->softDeletes()->nullable();
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
		Schema::table('investment_trusts', function (Blueprint $table) {
			$table->dropSoftDeletes();
			$table->dropAdmin_id();
		});
	}
}

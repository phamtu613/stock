<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeleteAndAdminIdToInvestmentConsultingsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('investment_consultings', function (Blueprint $table) {
			$table->softDeletes()->nullable();
			$table->unsignedBigInteger('admin_id')->nullable()->nullable();
			$table->foreign('admin_id')->references('id')->on('admins')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('investment_consultings', function (Blueprint $table) {
			$table->dropSoftDeletes();
			$table->dropAdmin_id();
		});
	}
}

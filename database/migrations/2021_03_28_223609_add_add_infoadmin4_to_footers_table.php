<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddInfoadmin4ToFootersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('footers', function (Blueprint $table) {
			$table->string('image_trainer4', 250);
			$table->string('name_trainer4', 30);
			$table->string('desc_trainer4', 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('footers', function (Blueprint $table) {
			//
		});
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('knowledges', function (Blueprint $table) {
			$table->id();
			$table->string('title', 200);
			$table->text('slug');
			$table->text('description');
			$table->text('content');
			$table->string('thumbnail', 255)->default('public/uploads/no-image.png');
			$table->string('image', 255)->nullable();
			$table->integer('num_view')->default(100);
			$table->enum('vip', ['Bình thường', 'Vip'])->default('Bình thường');
			$table->enum('top_post', ['Không hiển thị', 'Hiển thị'])->default('Không hiển thị');
			$table->string('keyword', 250)->nullable();
			$table->unsignedBigInteger('admin_id');
			$table->foreign('admin_id')->references('id')->on('admins');
			$table->unsignedBigInteger('cate_knowledge_id');
			$table->foreign('cate_knowledge_id')->references('id')->on('cate_knowledges');
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
		Schema::dropIfExists('knowledges');
	}
}

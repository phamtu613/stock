<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostAdvisoryInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_advisory_invests', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->text('slug');
            $table->text('content');
            $table->string('thumbnail', 255)->default('public/uploads/no-image.png');
            $table->string('image', 255)->nullable();
            $table->integer('num_view')->default(100);
            $table->string('keyword', 250)->nullable();
            $table->unsignedBigInteger('cate_advisory_invest_id');
            $table->foreign('cate_advisory_invest_id')->references('id')->on('cate_advisory_invests');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('post_advisory_invests');
    }
}

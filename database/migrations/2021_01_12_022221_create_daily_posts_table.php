<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->nullable();
            $table->text('slug')->nullable();
            $table->string('description', 250)->nullable();
            $table->text('content')->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('num_view')->default(100);
            $table->enum('vip', ['Bình thường', 'Vip'])->default('Bình thường');
            $table->enum('top_post', ['Không', 'Có'])->default('Không');
            $table->string('keyword', 250)->nullable();
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
        Schema::dropIfExists('daily_posts');
    }
}

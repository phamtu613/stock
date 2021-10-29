<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCateDailyPostIdToDailyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('cate_daily_post_id');
            $table->foreign('cate_daily_post_id')->references('id')->on('cate_daily_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_posts', function (Blueprint $table) {
            //
        });
    }
}

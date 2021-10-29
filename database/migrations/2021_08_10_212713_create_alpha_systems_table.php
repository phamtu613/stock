<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlphaSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alpha_systems', function (Blueprint $table) {
            $table->id();
            $table->string('image_chart', 200);
            $table->date('date_upload');
            $table->unsignedBigInteger('cate_alpha_system_id');
            $table->foreign('cate_alpha_system_id')->references('id')->on('cate_alpha_systems');
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
        Schema::dropIfExists('alpha_systems');
    }
}

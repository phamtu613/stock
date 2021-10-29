<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('info_footer', 150);
            $table->string('address', 100);
            $table->text('fanpage');
            $table->string('image_trainer1', 250);
            $table->string('name_trainer1', 30);
            $table->string('desc_trainer1', 100);
            $table->string('image_trainer2', 250);
            $table->string('name_trainer2', 30);
            $table->string('desc_trainer2', 100);
            $table->string('image_trainer3', 250);
            $table->string('name_trainer3', 30);
            $table->string('desc_trainer3', 100);
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
        Schema::dropIfExists('footers');
    }
}

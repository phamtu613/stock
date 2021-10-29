<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('phone1', 11);
            $table->string('phone2', 11);
            $table->string('email', 50);
            $table->string('facebook', 100);
            $table->text('map');
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
        Schema::dropIfExists('info_stocks');
    }
}

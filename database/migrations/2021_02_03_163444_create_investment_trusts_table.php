<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentTrustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_trusts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 100);
            $table->string('phone', 11);
            $table->string('content', 250)->nullable();
            $table->enum('status_contact', ['Chưa liên hệ', 'Đã liên hệ'])->default('Chưa liên hệ');
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
        Schema::dropIfExists('investment_trusts');
    }
}

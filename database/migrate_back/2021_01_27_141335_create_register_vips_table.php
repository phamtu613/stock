<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRegisterVipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_vips', function (Blueprint $table) {
            $table->id();
            $table->integer('phone')->nullable();
            $table->enum('package', ['6 tháng: 200.000', '1 năm: 400.000', 'Trọn đời: 1.500.000']);
            $table->string('expiration')->nullable()->default('0');
            $table->enum('status', ['Chưa thanh toán', 'Đã thanh toán'])->default('Chưa thanh toán');
            $table->timestamp('expiration')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('register_vips');
    }
}

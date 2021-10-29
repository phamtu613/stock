<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddRegisterVipToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone')->nullable();
            $table->enum('package', ['6 tháng: 200.000', '1 năm: 400.000', 'Trọn đời: 1.500.000']);
            $table->string('expiration_date')->nullable()->default('0');
            $table->enum('status', ['Chưa thanh toán', 'Đã thanh toán'])->default('Chưa thanh toán');
            $table->timestamp('expiration')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

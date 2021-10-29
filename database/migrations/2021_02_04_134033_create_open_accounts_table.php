<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->date('birthday');
            $table->text('identity_card');
            $table->date('date_permit');
            $table->string('address_permit');
            $table->string('address_full');
            $table->string('email', 100);
            $table->string('phone', 11);
            $table->string('username_bank');
            $table->string('branch_bank');
            $table->string('content', 250)->nullable();
            $table->enum('status_contact', ['Chưa mở', 'Đã mở'])->default('Chưa mở');
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
        Schema::dropIfExists('open_accounts');
    }
}

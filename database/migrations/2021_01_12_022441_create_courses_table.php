<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->nullable();
            $table->text('slug')->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->text('info_course')->nullable();
            $table->text('curriculum')->nullable();
            $table->integer('price_old')->nullable();
            $table->integer('price_current')->nullable();
            $table->text('link_excel')->nullable();
            $table->integer('num_student')->default(100)->nullable();
            $table->integer('num_star')->default(169)->nullable();
            $table->string('keyword', 250)->nullable();
            $table->string('type', 250)->nullable();
            $table->integer('num_lesson')->nullable();
            $table->string('time')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->unsignedBigInteger('cate_course_id');
            $table->foreign('cate_course_id')->references('id')->on('cate_courses');
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
        Schema::dropIfExists('courses');
    }
}

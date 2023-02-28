<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
          $table->bigIncrements('course_id');
          $table->string('course_code',10);
          $table->string('course_title',50);
          $table->integer('dept_id');
          $table->integer('course_creator')->nullable();
          $table->integer('course_editor')->nullable();
          $table->string('course_slug',100)->nullable();
          $table->integer('course_status')->default(1);
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
};

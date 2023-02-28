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
        Schema::create('offered_courses', function (Blueprint $table) {
          $table->bigIncrements('offered_course_id');
          $table->integer('course_id');
          $table->integer('dept_id');
          $table->integer('tcr_id');
          $table->string('year');
          $table->integer('semester_id');
          $table->integer('offered_course_creator')->nullable();
          $table->integer('offered_course_editor')->nullable();
          $table->string('offered_course_slug',100)->nullable();
          $table->integer('enable_evaluation')->default(1);
          $table->integer('offered_course_status')->default(1);
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
        Schema::dropIfExists('offered_courses');
    }
};

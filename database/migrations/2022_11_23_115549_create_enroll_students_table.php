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
        Schema::create('enroll_students', function (Blueprint $table) {
          $table->bigIncrements('enroll_id');
          $table->string('stu_id',50);
          $table->integer('offered_course_id');
          $table->string('enroll_slug',100)->nullable();
          $table->integer('enroll_creator')->nullable();
          $table->integer('evaluation_status')->default(1);
          $table->integer('enroll_status')->default(1);
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
        Schema::dropIfExists('enroll_students');
    }
};

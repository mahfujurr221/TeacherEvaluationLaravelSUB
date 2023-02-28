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
        Schema::create('mcq_responses', function (Blueprint $table) {
          $table->bigIncrements('response_id');
          $table->integer('offered_course_id');
          $table->string('stu_id',50);
          $table->integer('question_id');
          $table->string('version_id',10);
          $table->string('semester',10);
          $table->integer('year');
          $table->text('mcq_response');
          $table->integer('response_status')->default(1);
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
        Schema::dropIfExists('mcq_responses');
    }
};

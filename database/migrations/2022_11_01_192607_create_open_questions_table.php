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
        Schema::create('_11_open_questions', function (Blueprint $table) {
          $table->bigIncrements('question_id')->unique();
          $table->string('question_version_id',10)->unique();
          $table->string('question_description',100)->nullable();
          $table->string('question_answer')->nullable();
          $table->integer('question_creator',10)->nullable();
          $table->integer('question_ceditor')->nullable();
          $table->string('question_slug',100)->nullable();
          $table->integer('question_status')->default(1);
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
        Schema::dropIfExists('_11_open_questions');
    }
};

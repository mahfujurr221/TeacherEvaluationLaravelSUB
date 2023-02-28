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
        Schema::create('open_questions', function (Blueprint $table) {
          $table->bigIncrements('question_id');
          $table->string('question_version_id',10);
          $table->string('question_description',100)->nullable();
          $table->integer('question_creator')->nullable();
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
        Schema::dropIfExists('open_questions');
    }
};

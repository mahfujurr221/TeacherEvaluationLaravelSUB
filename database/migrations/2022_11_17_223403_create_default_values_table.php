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
        Schema::create('default_values', function (Blueprint $table) {
          $table->bigIncrements('default_id');
          $table->string('question_version_id',10);
          $table->string('semester_year',10)->nullable();
          $table->string('semester_id')->unique();
          $table->integer('default_status')->default(1);
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
        Schema::dropIfExists('default_values');
    }
};

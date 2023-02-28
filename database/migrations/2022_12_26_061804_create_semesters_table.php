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
        Schema::create('semesters', function (Blueprint $table) {
          $table->bigIncrements('semester_id');
          $table->string('semester_name',100)->unique();
          $table->integer('semester_creator')->nullable();
          $table->integer('semester_editor')->nullable();
          $table->string('semester_slug',100)->nullable();
          $table->integer('semester_status')->default(1);
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
        Schema::dropIfExists('semesters');
    }
};

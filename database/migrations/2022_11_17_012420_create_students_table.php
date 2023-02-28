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
        Schema::create('students', function (Blueprint $table) {
          $table->string('stu_id')->unique();
          $table->integer('dept_id');
          $table->string('name',50)->nullable();
          $table->string('email',50)->nullable();
          $table->string('picture')->nullable();
          $table->integer('stu_creator')->nullable();
          $table->integer('stu_editor')->nullable();
          $table->string('stu_slug',100)->nullable();
          $table->integer('stu_status')->default(1);
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
        Schema::dropIfExists('students');
    }
};

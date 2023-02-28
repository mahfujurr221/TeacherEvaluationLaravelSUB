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
        Schema::create('teachers', function (Blueprint $table) {
          $table->bigIncrements('tcr_id');
          $table->integer('dept_id');
          $table->string('name',50)->nullable();
          $table->string('email',50)->nullable();
          $table->string('picture')->nullable();
          $table->integer('tcr_creator')->nullable();
          $table->integer('tcr_editor')->nullable();
          $table->string('tcr_slug',100)->nullable();
          $table->integer('tcr_status')->default(1);
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
        Schema::dropIfExists('teachers');
    }
};

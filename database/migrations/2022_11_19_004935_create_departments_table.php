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
        Schema::create('departments', function (Blueprint $table) {
          $table->bigIncrements('dept_id');
          $table->string('dept_code',20)->unique();
          $table->string('dept_name',100)->unique();
          $table->integer('dept_creator')->nullable();
          $table->integer('dept_editor')->nullable();
          $table->string('dept_slug',100)->nullable();
          $table->integer('dept_status')->default(1);
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
        Schema::dropIfExists('departments');
    }
};

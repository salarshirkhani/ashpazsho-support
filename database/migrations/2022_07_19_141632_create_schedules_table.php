<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->nullable(); 
            $table->string('mobile', 191)->nullable(); 
            $table->string('content', 191)->nullable(); 
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}

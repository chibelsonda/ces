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
        Schema::create('subject_offering_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_offering_id')->unsigned();
            $table->integer('instructor_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->string('days', 50);
            $table->time('time_start');
            $table->time('time_end');
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
        Schema::dropIfExists('subject_offering_schedules');
    }
};

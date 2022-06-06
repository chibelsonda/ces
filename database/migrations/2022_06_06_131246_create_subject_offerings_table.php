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
        Schema::create('subject_offerings', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('school_year')->unsigned();
            $table->string('section', 50);
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
        Schema::dropIfExists('subject_offerings');
    }
};

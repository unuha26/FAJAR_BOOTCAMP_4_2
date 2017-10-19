<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
                $table->foreign('student_id')->references('id')->on('student');
            $table->integer('assignment_id')->unsigned();
                $table->foreign('assignment_id')->references('id')->on('assignmrnt');
            $table->integer('course_id')->unsigned();
                $table->foreign('course_id')->references('id')->on('course');
            $table->string('nilai');
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
        Schema::dropIfExists('nilai');
    }
}

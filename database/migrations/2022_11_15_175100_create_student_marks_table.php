<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_marks', function (Blueprint $table) {
            $table->id();            
            $table->integer('stud_id');
            $table->integer('maths');
            $table->integer('science');
            $table->integer('history');
            $table->string('term'); 
            $table->integer('total_marks');              
            $table->timestamps();
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_marks');
    }
}

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
        Schema::create('exams_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('exam_id')->constrained('exams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('exam_question_id')->constrained('exam_questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('exam_question_answer_id')->constrained('exam_question_answers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('exams_history');
    }
};

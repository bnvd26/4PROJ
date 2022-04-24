<?php

use App\Models\Exam;
use App\Models\ExamQuestion;
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
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->text('question');
            $table->timestamps();
        });

        foreach(Exam::all() as $exam) {
            for ($i=0; $i < 4; $i++) {
                ExamQuestion::create([
                    'exam_id' => $exam->id,
                    'question' => 'Ligula ornare commodo elementum ornare commodo elementum commodo elementum ornare commodo ?'
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_questions');
    }
};

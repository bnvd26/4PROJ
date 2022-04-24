<?php

use App\Models\ExamQuestion;
use App\Models\ExamQuestionAnswer;
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
        Schema::create('exam_question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_question_id')->constrained('exam_questions')->onUpdate('cascade')->onDelete('cascade');
            $table->text('answer');
            $table->boolean('truth');
            $table->timestamps();
        });

        $faker = Faker\Factory::create('fr_FR');

        foreach (ExamQuestion::all() as $question) {
            for ($i=0; $i < 3; $i++) {
                ExamQuestionAnswer::create(['exam_question_id' => $question->id, 'answer' => $faker->name, 'truth' => rand(0, 1) == '1']);
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
        Schema::dropIfExists('exam_question_answers');
    }
};

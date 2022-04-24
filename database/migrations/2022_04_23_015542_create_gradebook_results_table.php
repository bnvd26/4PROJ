<?php

use App\Models\Gradebook;
use App\Models\GradebookResult;
use App\Models\Student;
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
        Schema::create('gradebook_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gradebook_id')->constrained('gradebooks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('result')->default(0);
            $table->boolean('passed')->default(false);
            $table->timestamps();
        });

        foreach(Student::all() as $student) {
            $gradebook = Gradebook::create(['student_id' => $student->id]);
            
            foreach($student->subjects as $subject) {
                $result = rand(0, 1) == 1 ? 0 : rand(0, 100);

                GradebookResult::create([
                    'gradebook_id' => $gradebook->id,
                    'subject_id' => $subject->id,
                    'result' => $result,
                    'passed' => $result != 0
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
        Schema::dropIfExists('gradebook_results');
    }
};

<?php

use App\Models\Internship;
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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
        });

        $faker = Faker\Factory::create('fr_FR');

        $students = Student::where('internship', true)->get();

        foreach($students as $student) {
            $start_date = Carbon\Carbon::now()->subYears(rand(0, 2));

            $end_date = $start_date->addYears(2);

            Internship::create([
                'student_id' => $student->id,
                'company_name' => $faker->company,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship');
    }
};

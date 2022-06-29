<?php

use App\Models\AcademicDirection;
use App\Models\Gradebook;
use App\Models\GradebookResult;
use App\Models\PedagogyMember;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $user_student = User::create([
            'first_name' => 'Richard',
            'last_name' => 'Lenoir',
            'type' => 'student',
            'email' => 'student@supinfo.com',
            'password' => '$2y$10$cFOVPf3Da4MdY2SY0imtgOAHMOlazIsdng6QjwgEDp8azLqIBM4Ri'
        ]);

        $student = Student::create([
            'user_id' => $user_student->id,
            'promotion_id' => DB::table('promotions')->get()->random()->id,
            'campus_id' => DB::table('campuses')->get()->random()->id,
            'birth_date' => Carbon\Carbon::now()->subYears(rand(18, 26)),
            'internship' => rand(0,1) == 1,
        ]);


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


        $user_academic_direction = User::create([
            'first_name' => 'Gustave',
            'last_name' => 'Flaubert',
            'type' => 'academic_direction',
            'email' => 'academic@supinfo.com',
            'password' => '$2y$10$ADZjea5SVLkG6HViKvj7PeqrZmGj31qlG3oERjtvMjj.D9JfOcqv.'
        ]);

        AcademicDirection::create(['user_id' => $user_academic_direction->id ]);


        $user_pedagogy_member = User::create([
            'first_name' => 'Emile',
            'last_name' => 'Louis',
            'type' => 'pedagogy_member',
            'email' => 'pedagogy@supinfo.com',
            'password' => '$2y$10$L7hfWym6c8wa6h.gqryXPe6iuS2YPUk5wpffB7NI/9nfAjxct5.4O'
        ]);

        PedagogyMember::create(['user_id' => $user_pedagogy_member->id, 'campus_id' => DB::table('campuses')->get()->random()->id]);

        $user_administration = User::create([
            'first_name' => 'Emile',
            'last_name' => 'Louis',
            'type' => 'administration',
            'email' => 'administration@supinfo.com',
            'password' => '$2y$10$2YTOtEwrP/9b6a6O7ozHuO.kHREC66pGapPJSra51PIfaDE8jQ/vC'
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

<?php

use App\Models\Promotion;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('promotion_id')->constrained('promotions')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('campus_id')->constrained('campuses')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->boolean('internship')->nullable();
            $table->timestamps();
        });

        $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i < 300; $i++) {
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'type' => 'student',
                'email' => $faker->email,
                'password' => '$2y$10$cNb4kPIEQ5ThTD90RFuuhOp96qk3EnCGTVkoOC4KER.KQyoocQ7ui'
            ]);

            Student::create([
                'user_id' => $user->id,
                'promotion_id' => DB::table('promotions')->get()->random()->id,
                'campus_id' => DB::table('campuses')->get()->random()->id,
                'birth_date' => Carbon\Carbon::now()->subYears(rand(18, 26)),
                'internship' => rand(0,1) == 1,
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
        Schema::dropIfExists('students');
    }
};

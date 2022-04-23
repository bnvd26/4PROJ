<?php

use App\Models\Campus;
use App\Models\Professor;
use App\Models\Subject;
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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });

        $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i < count(Campus::all()); $i++) {
            foreach(Subject::all() as $subject) {
                Professor::create(['subject_id' => $subject->id, 'company_name' => $faker->company, 'last_name' => $faker->lastName,
                    'first_name' => $faker->firstName, 'email' => $faker->email, 'phone_number' => $faker->phoneNumber
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
        Schema::dropIfExists('professors');
    }
};

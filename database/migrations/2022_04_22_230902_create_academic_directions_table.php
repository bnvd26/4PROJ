<?php

use App\Models\AcademicDirection;
use App\Models\User;
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
        Schema::create('academic_directions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->timestamps();
        });

        $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i < 5; $i++) {
            $user = User::create(['first_name' => $faker->firstName, 'last_name' => $faker->lastName, 'type' => 'academic_direction',
            'email' => $faker->email, 'password' => '$2y$10$ptbC/dBL2ObpLwbBngC/We4kpSH5Hu34FDT2DTq9sQiKH7axc9I2K']);

            AcademicDirection::create(['user_id' => $user->id ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_directions');
    }
};

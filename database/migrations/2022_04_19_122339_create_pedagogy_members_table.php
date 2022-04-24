<?php

use App\Models\PedagogyMember;
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
        Schema::create('pedagogy_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('campus_id')->constrained('campuses')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) {
            $user = User::create(['first_name' => $faker->firstName, 'last_name' => $faker->lastName, 'type' => 'pedagogy_member',
            'email' => $faker->email, 'password' => '$2y$10$C6yP2KruUX02rqLzXuRiXONdw8/Fqsuy1g.80Glk9.1YWArYZYCtG']);

            PedagogyMember::create(['user_id' => $user->id, 'campus_id' => DB::table('campuses')->get()->random()->id]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedagogy_members');
    }
};

<?php

use App\Models\Campus;
use App\Models\Professor;
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
        Schema::create('campus_professors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campus_id')->constrained('campuses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('professor_id')->constrained('professors')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        $count = 0;

        foreach(Professor::all() as $professor) {

            $count++;

            if($count <= 30) {
                $professor->campuses()->attach(Campus::find(1)->id);
            } else {
                $professor->campuses()->attach(Campus::find(2)->id);
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
        Schema::dropIfExists('campus_professors');
    }
};

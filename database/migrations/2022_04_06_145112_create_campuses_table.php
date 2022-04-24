<?php

use App\Models\Campus;
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
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->text('street_address')->nullable();
            $table->string('zipcode')->nullable();
            $table->timestamps();
        });

        Campus::create(['location' => 'Paris', 'street_address' => '28 Rue des Francs Bourgeois', 'zipcode' => '75003']);
        Campus::create(['location' => 'Distanciel']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
};

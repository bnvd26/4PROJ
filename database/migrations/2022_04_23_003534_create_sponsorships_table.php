<?php

use App\Models\Sponsorship;
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
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $sponsors = ['Cisco', 'LinkedIn', 'Amazon', 'Miscrosft'];

        foreach($sponsors as $sponsor) {
            Sponsorship::create(['name' => $sponsor]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsorships');
    }
};

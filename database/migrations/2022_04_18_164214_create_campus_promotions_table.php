<?php

use App\Models\Campus;
use App\Models\Promotion;
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
        Schema::create('campus_promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campus_id')->constrained('campuses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('promotion_id')->constrained('promotions')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        foreach(Promotion::all() as $promotion) {
            DB::table('campus_promotions')->insert([
                'campus_id' => Campus::where('location', 'Paris')->first()->id,
                'promotion_id' => $promotion->id
            ]);
        }

        foreach(Promotion::all() as $promotion) {
            DB::table('campus_promotions')->insert([
                'campus_id' => Campus::where('location', 'Distanciel')->first()->id,
                'promotion_id' => $promotion->id
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
        Schema::dropIfExists('campus_promotions');
    }
};

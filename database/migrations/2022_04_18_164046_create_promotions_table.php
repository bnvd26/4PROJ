<?php

use App\Models\Promotion;
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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('degree');
            $table->string('prefix');
            $table->timestamps();
        });

        Promotion::create(['year' => '2017', 'degree' => 'fifth', 'prefix'=> '5']);
        Promotion::create(['year' => '2018', 'degree' => 'fourth', 'prefix'=> '4']);
        Promotion::create(['year' => '2019', 'degree' => 'third', 'prefix'=> '3']);
        Promotion::create(['year' => '2020', 'degree' => 'second', 'prefix'=> '2']);
        Promotion::create(['year' => '2021', 'degree' => 'first', 'prefix'=> '1' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};

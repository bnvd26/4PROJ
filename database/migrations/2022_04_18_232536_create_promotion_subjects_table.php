<?php

use App\Models\Promotion;
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
        Schema::create('promotion_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promotion_id')->constrained('promotions')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('subject_id')->constrained('subjects')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->timestamps();
        });

        $subjects = [];

        if (($open = fopen(storage_path() . "/Liste_Intervenants.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $subjects[] = $data;
            }

            fclose($open);
        }

        $filtered_subjects = [];

        foreach($subjects as $subject) {
            $filtered_subjects[] = $subject[4];
        }

        $filtered_subjects = array_unique($filtered_subjects);

        array_shift($filtered_subjects);

        foreach(Promotion::all() as $promotion) {

            foreach($filtered_subjects as $subject) {
                if ($subject[0] == $promotion->id) {
                    $subject = Subject::where('name', $subject)->first()->id;
                    $promotion->subjects()->attach($subject);
                }
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
        Schema::dropIfExists('promotion_subjects');
    }
};

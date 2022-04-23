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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('course')->nullable();
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

        foreach($filtered_subjects as $subject) {
            if($subject[4] != 'modules') {
                Subject::create(['name' => $subject,
                'course' =>
                '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vestibulum magna sit amet ligula maximus facilisis id at velit. Ut sagittis turpis vel eros aliquet, eget scelerisque tortor sollicitudin. Pellentesque tempus volutpat egestas. Sed dictum nulla vel purus cursus suscipit. Mauris scelerisque dui sit amet dolor convallis, eu blandit nulla bibendum. Maecenas lacinia posuere lectus, et mattis sem porta nec. Nam ut elementum nunc. Donec tempus eros sapien, in auctor velit suscipit sed. Nulla auctor magna nisl, eu dictum elit faucibus vel. In ornare dictum tincidunt. Fusce condimentum, lacus gravida porta convallis, lacus urna gravida orci, et semper nulla turpis nec urna. Nulla egestas tellus purus, et ultrices ex consequat non. Sed et nunc pretium, ullamcorper est sit amet, congue dui. Fusce sed metus ut nisl dictum faucibus eget sed metus. Nullam mattis sagittis risus, sit amet pretium tortor elementum ut. Curabitur ac erat dignissim massa cursus molestie id non odio.</p>

                <p>In tellus enim, commodo eu nisl non, tempus feugiat massa. Cras tristique, dui quis consequat efficitur, nunc sapien tincidunt orci, sed blandit mi purus pharetra arcu. Nullam dui risus, consectetur at lacinia at, convallis placerat velit. Praesent dui libero, imperdiet sed lacus ac, interdum efficitur nisi. Pellentesque nec volutpat dolor. Donec sodales felis vel tristique fringilla. Ut vitae gravida tellus, vel iaculis velit. Vivamus hendrerit eget ligula ac auctor. Sed at risus sit amet libero rutrum tristique. Nullam et condimentum elit. Phasellus mollis pretium felis sit amet molestie. Quisque faucibus lacus sed malesuada dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris vitae placerat arcu. Pellentesque convallis, nibh eget vehicula pellentesque, urna quam sollicitudin lacus, ut aliquam nisl dui id ante. Aenean vitae auctor ipsum.</p>

                <p>Praesent porta erat ullamcorper elit accumsan, eu vehicula magna malesuada. Cras enim mauris, eleifend in lorem in, faucibus maximus orci. Etiam vulputate ligula tristique, sagittis lectus quis, aliquam ligula. Curabitur eget velit ac dui vulputate commodo et pellentesque mauris. Vestibulum nec quam condimentum, dapibus augue et, interdum magna. In sapien ligula, pellentesque at magna sit amet, condimentum pellentesque turpis. Aliquam nec molestie nulla. Suspendisse potenti. Pellentesque nec porttitor lacus, quis mollis sem. Integer tempus justo sed ullamcorper convallis. Maecenas imperdiet sed erat id ultricies. Pellentesque vel lobortis ligula. Cras bibendum nec odio id rhoncus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis iaculis, massa vitae accumsan auctor, arcu elit commodo metus, quis volutpat libero nibh venenatis nibh.</p>

                <p>Cras vel molestie neque, a pretium ex. Integer quis diam at sapien egestas fermentum. Aliquam non accumsan ante. Quisque eu pharetra urna, eu fermentum velit. Donec felis elit, consequat at posuere lacinia, ultrices eu lectus. Aenean tincidunt, metus quis sagittis pellentesque, metus lacus tincidunt libero, scelerisque efficitur nibh diam ac nulla. Curabitur finibus facilisis enim, semper convallis neque pulvinar a. Quisque at magna venenatis, blandit lacus sed, fringilla ante. Suspendisse nisi tellus, finibus a justo id, hendrerit gravida ipsum. Duis sollicitudin turpis ultrices nulla sodales blandit. Nunc leo justo, placerat id mi in, semper fermentum tortor.</p>

                <p>Aenean id aliquet ante. Etiam quis est pharetra, rutrum ipsum ac, sagittis urna. Pellentesque vel faucibus lorem, euismod tincidunt libero. Phasellus est dolor, laoreet sed nisl eget, placerat lacinia tellus. Maecenas molestie tempor viverra. Donec a facilisis urna, porttitor venenatis metus. Donec varius, purus consectetur placerat placerat, odio est dignissim tortor, imperdiet dictum sem enim sed sem. Praesent fringilla vel lectus ut faucibus. Nunc eu lorem tincidunt, fermentum metus a, auctor leo. Nulla vel augue vestibulum, laoreet nunc in, mollis enim. Praesent libero felis, aliquet at mattis et, vehicula in lacus. Nulla nec enim eget tortor laoreet pulvinar ac ac ante. Aliquam ultricies hendrerit risus a ultrices. Integer nec nisi aliquet, sagittis lorem quis, finibus est. Integer euismod efficitur nisi, in porta odio finibus nec.</p>'
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
        Schema::dropIfExists('subjects');
    }
};

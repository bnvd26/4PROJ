<?php

namespace App\Http\Controllers\PlatformStudent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GradebookController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Subject  $subject
    *
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
        $gradebooks = Student::where('user_id', Auth::user()->id)->first()->gradebooks;

        return view('platform_student.gradebooks.show', compact('gradebooks'));
    }
}

<?php

namespace App\Http\Controllers\PlatformStudent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SubjectController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (! Gate::allows('student')) {
            abort(403);
        }
        $current_student = Student::where('user_id', Auth::user()->id)->first();

        $subjects = $current_student->subjects;

        return view('platform_student.subjects.index', compact('subjects'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Subject  $subject
    *
    * @return \Illuminate\Http\Response
    */
    public function show(Subject $subject)
    {
        return view('platform_student.subjects.show', compact('subject'));
    }
}

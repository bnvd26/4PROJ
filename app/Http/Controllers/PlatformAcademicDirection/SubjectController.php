<?php

namespace App\Http\Controllers\PlatformAcademicDirection;

use App\Http\Controllers\Controller;
use App\Models\Subject;
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
        if (! Gate::allows('academic_direction')) {
            abort(403);
        }

        $subjects = Subject::all();

        return view('platform_academic_direction.subjects.index', compact('subjects'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Student  $student
    *
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $subject = Subject::find($id)->first();

        return view('platform_academic_direction.subjects.show', compact('subject'));
    }
}

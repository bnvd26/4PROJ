<?php

namespace App\Http\Controllers\PlatformAcademicDirection;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\PedagogyMember;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
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

        $students = Student::all();

        return view('platform_academic_direction.students.index', compact('students'));
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
        $student = Student::find($id)->first();
        
        return view('platform_academic_direction.students.show', compact('student'));
    }
}

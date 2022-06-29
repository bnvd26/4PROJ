<?php

namespace App\Http\Controllers\PlatformPedagogy;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\PedagogyMember;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        if (! Gate::allows('pedagogy_member')) {
            abort(403);
        }

        $pedagogy = PedagogyMember::where('user_id', Auth::user()->id)->first();

        $students = DB::table('students')->where('campus_id', $pedagogy->campus_id)->paginate(25);

        return view('platform_pedagogy.students.index', compact('students'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Student  $student
    *
    * @return \Illuminate\Http\Response
    */
    public function show(Student $student)
    {
        return view('platform_pedagogy.students.show', compact('student'));
    }
}

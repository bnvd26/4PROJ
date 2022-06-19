<?php

namespace App\Http\Controllers\PlatformAdmin;

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
        if (! Gate::allows('platform_administrator')) {
            abort(403);
        }

        $subjects = Subject::paginate(25);

        return view('platform_admin.subjects.index', compact('subjects'));
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
        return view('platform_admin.subjects.show', compact('subject'));
    }
}

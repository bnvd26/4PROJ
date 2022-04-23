<?php

namespace App\Http\Controllers\PlatformAdmin;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProfessorController extends Controller
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

        $professors = Professor::orderBy('subject_id')->get();

        return view('platform_admin.professors.index', compact('professors'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        if (! Gate::allows('platform_administrator')) {
            abort(403);
        }

        $subjects = Subject::all();

        return view('platform_admin.professors.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Responseso
     */
    public function store(Request $request)
    {
        if (! Gate::allows('platform_administrator')) {
            abort(403);
        }

        Professor::create([
            'subject_id' => $request->subject,
            'company_name' => $request->company_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('professors.index')->with('message','Le professeur a été crée avec succès');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Professor  $professor
    *
    * @return \Illuminate\Http\Response
    */
    public function show(Professor $professor)
    {
        return view('platform_admin.professors.show', compact('professor'));
    }
}

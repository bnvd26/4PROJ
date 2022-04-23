<?php

namespace App\Http\Controllers\PlatformPedagogy;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\PedagogyMember;
use App\Models\Professor;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (! Gate::allows('pedagogy_member')) {
            abort(403);
        }

        $professors = Campus::find(PedagogyMember::where('user_id', Auth::user()->id)->first()->campus->id)->first()->professors->sortBy('name');

        return view('platform_pedagogy.professors.index', compact('professors'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Professor  $professor
    *
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        if (! Gate::allows('pedagogy_member')) {
            abort(403);
        }

        $professor = Professor::find($id)->first();

        return view('platform_pedagogy.professors.show', compact('professor'));
    }
}

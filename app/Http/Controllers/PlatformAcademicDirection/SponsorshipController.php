<?php

namespace App\Http\Controllers\PlatformAcademicDirection;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Gate;

class SponsorshipController extends Controller
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

        $sponsorships = Sponsorship::all();

        return view('platform_academic_direction.sponsorships.index', compact('sponsorships'));
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
        $sponsorship = Sponsorship::find($id)->first();

        return view('platform_academic_direction.sponsorships.show', compact('sponsorship'));
    }
}

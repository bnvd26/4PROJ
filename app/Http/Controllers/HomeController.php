<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        $count_users = count($users);

        $campuses = Campus::all();

        $count_campus = count($campuses);

        return view('dashboard', compact('count_users', 'count_campus'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        $student = null;

        $subject = null;

        if(Auth::user()->type == 'student') {
            $student = Student::where('user_id', Auth::user()->id)->first();

            $subjects = $student->subjects;
        }

        return view('dashboard', compact('count_users', 'count_campus', 'student', 'subject'));
    }
}

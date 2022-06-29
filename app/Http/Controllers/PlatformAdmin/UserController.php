<?php

namespace App\Http\Controllers\PlatformAdmin;

use App\Http\Controllers\Controller;
use App\Models\AcademicDirection;
use App\Models\Campus;
use App\Models\PedagogyMember;
use App\Models\Promotion;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
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

        $users = User::orderBy('created_at', 'desc')->paginate(25);

        return view('platform_admin.users.index', compact('users'));
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

        $campuses = Campus::all();

        $promotions = Promotion::all();

        return view('platform_admin.users.create', compact('campuses', 'promotions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('platform_administrator')) {
            abort(403);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'type' => $request->user_type,
            'password' => bcrypt($request->password)
        ]);

        if($request->user_type == 'student') {
            Student::create([
                'user_id' => $user->id,
                'campus_id' => $request->campus,
                'promotion_id' => $request->promotion
            ]);
        }

        if($request->user_type == 'pedagogy_member') {
            PedagogyMember::create([
                'user_id' => $user->id,
                'campus_id' => $request->campus
            ]);
        }

        if($request->user_type == 'academic_direction') {
            AcademicDirection::create([
                'user_id' => $user->id,
                'campus_id' => $request->campus
            ]);
        }

        return redirect()->route('users.index')->with('message','L\'utilisateur a été crée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(User $user)
    {
        if (! Gate::allows('platform_administrator')) {
            abort(403);
        }

        return view('platform_admin.users.show', compact('user'));
    }
}

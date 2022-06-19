<?php

namespace App\Http\Controllers\PlatformAdmin;

use App\Http\Controllers\Controller;
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

        $users = User::paginate(25);

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

        return view('platform_admin.users.create');
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

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'type' => $request->user_type,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('users.index')->with('message','L\'utilisateur a été crée avec succès');;
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

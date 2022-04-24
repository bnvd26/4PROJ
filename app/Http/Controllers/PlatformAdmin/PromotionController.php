<?php

namespace App\Http\Controllers\PlatformAdmin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PromotionController extends Controller
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

        $campuses = Promotion::all();

        return view('platform_admin.promotions.index', compact('campuses'));
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

        return view('platform_admin.promotions.create');
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

        Promotion::create(['year' => $request->year, 'degree' => $request->degree]);

        return redirect()->route('platform_admin.promotions.index');
    }
}

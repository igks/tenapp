<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $matches = Matches::all();
        return view('home', compact('matches'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate(Matches::rules());

        Matches::create(request()->all());
        $matches = Matches::all();
        return view('home', compact('matches'));
    }

    public function edit(Matches $matches)
    {
        $match = Matches::find($matches->id);
        return view('form', compact('match')); 
    }

    public function update(Request $request, Matches $matches)
    {
        $request->validate(Matches::rules());
        $matches->update(request()->all());

        $matches = Matches::all();
        return view('home', compact('matches'));
    }
}

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

    public function edit(int $id)
    {
        $match = Matches::find($id);
        return view('form', compact('match')); 
    }

    public function update(Request $request, int $id)
    {
        $request->validate(Matches::rules());
        $match = Matches::find($id);
        if($match != null)
        {
            $match->update(request()->all());
        }

        return redirect()->route('home');
    }

    public function destroy(int $id)
    {
        $match = Matches::find($id);
        if($match != null){
            $match->delete();
        }
    }
}

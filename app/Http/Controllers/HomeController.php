<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use App\Exports\MatchExport;
use Maatwebsite\Excel\Facades\Excel;

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

        $match = Matches::create(request()->all());
        return view('board', compact('match'));
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

    public function score(Request $request)
    {
        $param = $request->input('data');
        $id = $param['matchId'];
        $scoreA = $param['scoreA'];
        $scoreB = $param['scoreB'];
        $match = Matches::find($id);
        if($match != null){
            $totalScore = Matches::calculateTotal($match);
            $set = $totalScore['teamA'] + $totalScore['teamB'];
            switch($set){
                case 0:
                    $match->update(['score_a_1' => $scoreA, 'score_b_1' => $scoreB]);
                    break;
                case 1:
                    $match->update(['score_a_2' => $scoreA, 'score_b_2' => $scoreB]);
                    break;
                case 2:
                    $match->update(['score_a_3' => $scoreA, 'score_b_3' => $scoreB]);
                    break;
                case 3:
                    $match->update(['score_a_4' => $scoreA, 'score_b_4' => $scoreB]);
                    break;
                case 4:
                    $match->update(['score_a_5' => $scoreA, 'score_b_5' => $scoreB]);
                    break;
            }
            $totalScore = Matches::calculateTotal($match);
        }

        return response()->json($totalScore);
    }

    public function report() 
    {
        return Excel::download(new MatchExport, 'matches.xlsx');
    }
}

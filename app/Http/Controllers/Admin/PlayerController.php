<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use App\Models\Club;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('player.index', compact('players'));
    }

    public function create()
    {
        return view('player.form');
    }

    public function store(Request $request)
    {
        $request->validate(Player::rules());

        Player::create(request()->all());
        return redirect()->route('players.index')->with('status', 'New record successfully added');
    }

    public function show(Player $player)
    {
        //
    }

    public function edit(Player $player)
    {
        $player = Player::find($player->id);
        return view('player.form', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate(Player::rules());
        $player->update(request()->all());
        return redirect()->route('players.index')->with('status', 'Data successfully updated');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Player::find($id)->delete();
    }

    public function playerDataTable(Request $request)
    {
        return DataTables::of(Player::query()->get())
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $btn = '
            <a class="badge badge-warning badge-sm badge-rounded text-dark" id="edit" data-id=' . $data->id . '>Edit</a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a class="badge badge-danger badge-sm badge-rounded text-light ml-3" id="delete" data-id=' . $data->id . '>Delete</a>
          ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->editColumn('club_id', function(Player $player){
                return Club::find($player['club_id'])->name;
              })
              ->editColumn('date_of_birth', function(Player $player){
                $from = new DateTime($player['date_of_birth']);
                $to   = new DateTime('today');
                return $from->diff($to)->y . " Years"; 
              })
            ->make(true);
    }

    public function playerSelect(Request $request){
        $term = trim($request->q);
        if(empty($term)){
            return response()->json([]);
        }

        $players = Player::select('id','first_name', 'last_name')->where('first_name', 'like', '%' .$term . '%')->limit(20)->get();

        $formattedPlayers = [];
        foreach($players as $player){
            $formattedPlayers[] = ['id'=>$player->id, 'text'=>$player->first_name . $player->last_name];
        }

        return response()->json($formattedPlayers);
    }
}

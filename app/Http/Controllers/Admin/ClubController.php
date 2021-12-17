<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\ClubExport;
use Maatwebsite\Excel\Facades\Excel;

class ClubController extends Controller
{
    public function index()
    {
        // $clubs = Club::all();
        // return view('club.index', compact('clubs'));
        return view('club.index');
    }

    public function create()
    {
        return view('club.form');
    }

    public function store(Request $request)
    {
        $request->validate(Club::rules());

        Club::create(request()->all());
        return redirect()->route('clubs.index')->with('status', 'New record successfully added');
    }

    public function edit(Club $club)
    {
        $club = Club::find($club->id);
        return view('club.form', compact('club'));
    }

    public function update(Request $request, Club $club)
    {
        $request->validate(Club::rules());
        $club->update(request()->all());
        return redirect()->route('clubs.index')->with('status', 'Data successfully updated');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Club::find($id)->delete();
    }

    public function clubDataTable(Request $request)
    {
        return DataTables::of(Club::query()->get())
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
            ->make(true);
    }

    public function clubSelect(Request $request){
        $term = trim($request->q);
        if(empty($term)){
            return response()->json([]);
        }

        $clubs = Club::select('id','name')->where('name', 'like', '%' .$term . '%')->limit(20)->get();

        $formattedClubs = [];
        foreach($clubs as $club){
            $formattedClubs[] = ['id'=>$club->id, 'text'=>$club->name];
        }

        return response()->json($formattedClubs);
    }

    public function report() 
    {
        return Excel::download(new ClubExport, 'clubs.xlsx');
    }
}

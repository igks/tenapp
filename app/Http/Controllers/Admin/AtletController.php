<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DateFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atlet;
use App\Models\Club;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\AtletExport;
use Maatwebsite\Excel\Facades\Excel;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atlets = Atlet::all();
        return view('atlet.index', compact('atlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atlet.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Atlet::rules());

        Atlet::create($request->all());
        return redirect()->route('atlets.index')->with('status', 'New record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atlet  $atlet
     * @return \Illuminate\Http\Response
     */
    public function show(Atlet $atlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atlet  $atlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Atlet $atlet)
    {
        $atlet = Atlet::find($atlet->id);
        return view('atlet.form', compact('atlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atlet  $atlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atlet $atlet)
    {
        $request->validate(Atlet::rules());
        $atlet->update(request()->all());
        return redirect()->route('atlets.index')->with('status', 'Data successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atlet  $atlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Atlet::find($id)->delete();
    }

    public function atletDataTable(Request $request)
    {
        return DataTables::of(Atlet::query()->get())
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $btn = '
            <a class="badge badge-warning badge-sm badge-rounded text-dark" id="edit" data-id=' . $data->id . '>Edit</a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a class="badge badge-danger badge-sm badge-rounded text-light ml-3" id="delete" data-id=' . $data->id . '>Delete</a>
          ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->editColumn('club_id', function(Atlet $atlet){
                return Club::find($atlet->club_id)->name ?? "-";
            })
            ->editColumn('tanggal_lahir', function(Atlet $atlet){
                return DateFormatter::format($atlet->tanggal_lahir);
            })
            ->make(true);
    }

    public function atletSelect(Request $request){
        $term = trim($request->q);
        if(empty($term)){
            return response()->json([]);
        }

        $atlets = Atlet::select('id', 'nama')->where('nama', 'like', '%'.$term.'%')->limit(20)->get();

        $result = [];
        foreach($atlets as $atlet){
            $result[] = ['id'=>$atlet->id, 'text'=>$atlet->nama];
        }

        return response()->json($result);
    }

    public function report() 
    {
        return Excel::download(new AtletExport, 'atlet.xlsx');
    }
}

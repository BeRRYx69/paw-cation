<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Antrean;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-web');
    }

    public function index()
    {
        $jadwal = Jadwal::Select("*")
        ->orderBy("id", "desc")
        ->get();
        return view('admin.home', compact('jadwal'));
        return response()->json($jadwal);    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tambah');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'jadwal_date' => 'required',
            'jam_sesi' => 'required',
            'jumlah' => 'required',
        ]);
        $datenow = Carbon::now()->format('Y-m-d');

        $jadwal = new Jadwal;
        $jadwal->jadwal_date = $request->get('jadwal_date');
        // $jadwal->jadwal_date = $datenow;
        $jadwal->jam_sesi = $request->get('jam_sesi');
        $jadwal->jumlah = $request->get('jumlah');
        $jadwal->save();
        // dd($jadwal);
        return redirect()->route('admin.home')
        ->with('success', 'Jadwal Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Jadwal::find($id)->delete();

        $this->expired($id);



        return redirect()->route('admin.home')
        -> with('success', 'Jadwal Berhasil Dihapus');

    }

    public function expired($id)
    {
        $expired = Antrean::where('id_jadwal', $id)->first();
        if(!is_null($expired)){
        $expired->status = 'Expired';
        $expired->Save();
        }
    }

}





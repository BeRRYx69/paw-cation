<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Antrean;
use App\Models\Jadwal;

use Illuminate\Http\Request;

class AntreanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin-web');
    }
    public function index()
    {
        //

        $book = Antrean::Select("*")
                ->where('status', 'menunggu konfirmasi')
                ->orWhere('status', 'Disetujui')
                ->orderBy("id_antrean", "asc")
                ->get();
        return view('admin.antrean.index', compact('book'));
        // return response()->json($buku);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id_peminjaman)
    {
        //
        $jumlah = Antrean::find($id_peminjaman);
        $slot = $jumlah->id_jadwal;
        $this->tersedia($slot);
        // dd($slot);
        Antrean::find($id_peminjaman)->delete();
        return redirect()->route('admin.listantrean')
        -> with('success', 'Antrean Berhasil Dihapus');
    }
    public function disetujui($id_antrean)
    {
        $disetujui = Antrean::where('id_antrean', $id_antrean)->first();
        $disetujui->status = 'Disetujui';
        $disetujui->save();
        return redirect()->route('admin.listantrean')
        -> with('success', 'Antrean Berhasil disetujui');
    }

    public function selesai($id_antrean)
    {
        $kembali = Antrean::where('id_antrean', $id_antrean)->first();
        $kembali->status = 'Selesai';
        $kembali->save();
        return redirect()->route('admin.listantrean')
        -> with('success', 'Antrean Telah Selesai');
    }

    public function cari(Request $request){
        $jadwal = Antrean::with('jadwal', 'user')->get();

        $search = $request->get('search');
        $antrean = Antrean::select('*')
        ->where('status','like','%'.$search.'%')
        ->orWhere('id_antrean','like','%'.$search.'%')
        ->orWhere('jenis_hewan','like','%'.$search.'%')
        ->orWhereHas('jadwal', function($q) use($search){
            $q->where('jadwal_date', 'like', '%' . $search . '%');})

        ->orWhereHas('user' ,function($q1) use($search){
            $q1->where('name', 'like', '%'. $search. '%');
        })
        ->get();
        return view('admin.antrean.index', ['antrean'=>$jadwal,'book'=>$antrean]);

    }

    public function tersedia($slot)
    {
        $jadwal = Jadwal::where('id', $slot)->first();
        $jadwal->jumlah  = $jadwal->jumlah + 1;
        $jadwal->save();

    }
}

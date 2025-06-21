<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Antrean;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use PDF;
use Carbon\Carbon;


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
        $this->kadaluwarsa();

        $jadwal = Jadwal::Select("*")
        ->orderBy("id", "desc")
        ->get();

        return view('home', compact('jadwal'));
        return response()->json($jadwal);

    }

    public function bookantrean($id)
    {
        $jadwal = Jadwal::where('id', $id)->get();
        // return response()->json($jadwal);

        return view('bookantrean', compact('jadwal'));

    }

    public function konfirmasidaftar(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_jadwal' => 'required',
            'jenis_hewan' => 'required',
            'keluhan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image_name='';
        if($request->file('foto')){
            $image_name= $request->file('foto')->store('img','public');
        }
        $antrean = new Antrean;
        $antrean->id_user = $request->get('id_user');
        $antrean->id_jadwal = $request->get('id_jadwal');
        $antrean->jenis_hewan = $request->get('jenis_hewan');
        $antrean->keluhan = $request->get('keluhan');
        $antrean->foto = $image_name;
        $antrean->status = 'menunggu konfirmasi';

        // dd($antrean);

        $antrean->save();

        $id = $antrean->id_jadwal = $request->get('id_jadwal');
        $this->minesjadwal($id);

        return redirect()->route('home')
        ->with('success', 'Antrean Berhasil di Booked');

    }

    public function minesjadwal($id)
    {

        $jadwal = Jadwal::where('id', $id)->first();
        $jadwal->jumlah  = $jadwal->jumlah - 1;

        $jadwal->save();
    }

    public function daftarbooking(Request $request){
        $userId = Auth::id();

        $book = Antrean::Select("*")
        ->where('id_user', $userId)
        ->get();
        return view('daftarbooking', compact('book'));
        return response()->json($book);

    }

    public function batalkan($id_antrean,$id_jadwal)
    {

       Antrean::find($id_antrean)->delete();
        $this->tersedia($id_jadwal);
        // return response()->json($id_buku);

        return redirect()->route('daftarantrean')
        -> with('success', 'Booking Berhasil Dibatalkan');
    }
    public function tersedia($id_jadwal)
    {
        $jadwal = Jadwal::where('id', $id_jadwal)->first();
        $jadwal->jumlah  = $jadwal->jumlah + 1;
        $jadwal->save();

    }

    public function rules()
    {
        return view('rules');
    }

    public function viewpdf($id_antrean)
    {
        $antrean = Antrean::find($id_antrean);
        return view('view', compact('antrean'));

    }

    public function cetakpdf($id_antrean){
        $antrean = Antrean::with('jadwal','user')->find($id_antrean);
        $pdf = PDF::loadview('pdfview', compact('antrean'));
        return $pdf->stream('antrean.pdf');
        readfile('antrean.pdf');

    }

    public function kadaluwarsa(){

        $jadwal = Jadwal::all();
        $jadwal_ids = [];

        foreach ($jadwal as $jadwals) {
            $jadwal_ids[]=  $jadwals->jadwal_date;
            $tgl =Carbon::parse($jadwals->jadwal_date)->diffInDays(now(),false);
            if ($tgl >= '1'){
                $sisa = 0;
            }else {
                $sisa = $jadwals->jumlah;

            }
            $jadwal_ids[]=  $jadwals->jumlah = $sisa;
            $jadwals->save();
        }
        // dd($jadwal_ids);

        // return response()->json($jadwal_ids);

    }

}

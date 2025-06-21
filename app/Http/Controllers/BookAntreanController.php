<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class BookAntreanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $jadwal = Jadwal::all();
        $selected_jenis_hewan = $request->query('jenis_hewan');
        
        return view('bookantrean', compact('jadwal', 'selected_jenis_hewan'));
    }

    public function create($jadwal_id, Request $request)
    {
        $jadwal = Jadwal::where('id', $jadwal_id)->get();
        $selected_jenis_hewan = $request->query('jenis_hewan');
        return view('bookantrean', compact('jadwal', 'selected_jenis_hewan'));
    }

    public function bookingByJenis($jenis_hewan)
    {
        $jadwal = \App\Models\Jadwal::where('jenis_hewan', $jenis_hewan)
            ->where('jadwal_date', '>=', now())
            ->orderBy('jadwal_date', 'asc')
            ->first();

        if ($jadwal) {
            return redirect()->route('booking.create', ['jadwal_id' => $jadwal->id]);
        } else {
            return redirect()->route('jadwal')->with('error', 'Jadwal untuk ' . $jenis_hewan . ' belum tersedia.');
        }
    }
} 
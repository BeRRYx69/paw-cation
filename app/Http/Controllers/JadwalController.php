<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use App\Models\Riwayat;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        // Simpan jenis hewan yang dipilih ke dalam session
        if ($request->has('jenis_hewan')) {
            session(['selected_jenis_hewan' => $request->jenis_hewan]);
        }

        // Ambil jadwal untuk hari ini dan ke depan, filter jika ada jenis_hewan
        $query = Jadwal::where('jadwal_date', '>=', Carbon::now()->startOfDay());
        if ($request->has('jenis_hewan')) {
            $query->where('jenis_hewan', $request->jenis_hewan);
        }
        $jadwals = $query->orderBy('jadwal_date', 'asc')
            ->orderBy('jam_sesi', 'asc')
            ->get();

        // Kelompokkan jadwal berdasarkan bulan untuk filter
        $months = $jadwals->groupBy(function($date) {
            return Carbon::parse($date->jadwal_date)->format('Y-m');
        });

        return view('jadwal.index', compact('jadwals', 'months'));
    }

    public function carijadwal(Request $request)
    {
        $search = $request->get('search');
        $sesi = $request->get('sesi');
        
        $jadwal = Jadwal::where('jadwal_date', '>=', Carbon::now()->startOfDay())
            ->when($search, function($query) use ($search) {
                return $query->whereDate('jadwal_date', $search);
            })
            ->when($sesi, function($query) use ($sesi) {
                return $query->where('jam_sesi', 'like', '%'.$sesi.'%');
            })
            ->orderBy('jadwal_date', 'asc')
            ->orderBy('jam_sesi', 'asc')
            ->get();

        return response()->json($jadwal);
    }

    public function daftarAntrian(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Cek ketersediaan slot
            $jadwal = Jadwal::findOrFail($id);
            if ($jadwal->jumlah < 1) {
                return back()->with('error', 'Maaf, slot sudah penuh');
            }

            // Kurangi jumlah slot
            $jadwal->jumlah -= 1;
            $jadwal->save();

            // Buat riwayat antrian
            Riwayat::create([
                'user_id' => Auth::id(),
                'jadwal_id' => $id,
                'tanggal_daftar' => Carbon::now(),
                'status' => 'terdaftar'
            ]);

            DB::commit();
            return redirect()->route('daftarantrean')->with('success', 'Berhasil mendaftar antrian');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function getJadwalByDate($date)
    {
        $jadwal = Jadwal::whereDate('jadwal_date', $date)
            ->orderBy('jam_sesi', 'asc')
            ->get();
        
        return response()->json($jadwal);
    }
}

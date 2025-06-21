<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        Jadwal::create([
            'jadwal_date' => now()->addDays(1),
            'jam_sesi' => '08:00 - 11:00',
            'jumlah' => 5,
            'jenis_hewan' => 'Anjing'
        ]);
        Jadwal::create([
            'jadwal_date' => now()->addDays(2),
            'jam_sesi' => '12:00 - 15:00',
            'jumlah' => 3,
            'jenis_hewan' => 'Kucing'
        ]);
    }
} 
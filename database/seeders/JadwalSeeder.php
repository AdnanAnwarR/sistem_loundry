<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $besok = Carbon::now()->addDay()->format('Y-m-d');
        
        $jadwals = [
            [
                'id' => 1,
                'tanggal' => $besok,
                'slot_waktu' => '08:00 - 10:00',
                'kapasitas' => 5,
                'terisi' => 2,
            ],
            [
                'id' => 2,
                'tanggal' => $besok,
                'slot_waktu' => '10:00 - 12:00',
                'kapasitas' => 5,
                'terisi' => 0,
            ],
            [
                'id' => 3,
                'tanggal' => $besok,
                'slot_waktu' => '13:00 - 15:00',
                'kapasitas' => 3,
                'terisi' => 3, // full booked
            ],
            [
                'id' => 4,
                'tanggal' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'slot_waktu' => '08:00 - 10:00',
                'kapasitas' => 5,
                'terisi' => 0,
            ],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}

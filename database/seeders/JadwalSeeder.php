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
        $besok = Carbon::now()->addDay()->format('Y-m-d'); // Mendapatkan tanggal besok dengan format Tahun-Bulan-Hari
        
        $jadwals = [ // Membuat array berisi data jadwal yang akan di-seed
            [ // Data jadwal pertama
                'id' => 1, // ID jadwal
                'tanggal' => $besok, // Mengatur tanggal jadwal untuk besok
                'slot_waktu' => '08:00 - 10:00', // Rentang waktu untuk slot ini
                'kapasitas' => 5, // Kapasitas maksimal pesanan untuk slot ini
                'terisi' => 2, // Jumlah pesanan yang sudah masuk untuk slot ini
            ],
            [ // Data jadwal kedua
                'id' => 2, // ID jadwal
                'tanggal' => $besok, // Mengatur tanggal jadwal untuk besok
                'slot_waktu' => '10:00 - 12:00', // Rentang waktu untuk slot ini
                'kapasitas' => 5, // Kapasitas maksimal pesanan
                'terisi' => 0, // Belum ada pesanan
            ],
            [ // Data jadwal ketiga
                'id' => 3, // ID jadwal
                'tanggal' => $besok, // Mengatur tanggal jadwal untuk besok
                'slot_waktu' => '13:00 - 15:00', // Rentang waktu untuk slot ini
                'kapasitas' => 3, // Kapasitas maksimal pesanan
                'terisi' => 3, // full booked // Slot waktu sudah penuh
            ],
            [ // Data jadwal keempat
                'id' => 4, // ID jadwal
                'tanggal' => Carbon::now()->addDays(2)->format('Y-m-d'), // Mengatur tanggal jadwal untuk lusa
                'slot_waktu' => '08:00 - 10:00', // Rentang waktu untuk slot ini
                'kapasitas' => 5, // Kapasitas maksimal pesanan
                'terisi' => 0, // Belum ada pesanan
            ],
        ];

        foreach ($jadwals as $jadwal) { // Melakukan perulangan untuk setiap data jadwal dalam array
            Jadwal::create($jadwal); // Menyimpan data jadwal ke dalam database
        }
    }
}

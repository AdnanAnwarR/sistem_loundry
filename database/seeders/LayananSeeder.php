<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanans = [
            [
                'id' => 1,
                'nama_layanan' => 'Cuci Reguler',
                'harga' => 5000,
                'durasi' => 120, // 2 jam
                'deskripsi' => 'Pencucian pakaian harian reguler',
            ],
            [
                'id' => 2,
                'nama_layanan' => 'Cuci Sepatu',
                'harga' => 25000,
                'durasi' => 180,
                'deskripsi' => 'Spa cuci sepatu bersih detail',
            ],
            [
                'id' => 3,
                'nama_layanan' => 'Setrika Saja',
                'harga' => 4000,
                'durasi' => 60,
                'deskripsi' => 'Setrika rapi licin per kg',
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}

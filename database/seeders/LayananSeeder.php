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
        $layanans = [ // Membuat array berisi data layanan yang akan di-seed
            [ // Data layanan pertama
                'id' => 1, // ID layanan
                'nama_layanan' => 'Cuci Reguler', // Nama dari layanan
                'harga' => 5000, // Harga layanan
                'durasi' => 120, // 2 jam // Waktu pengerjaan dalam menit
                'deskripsi' => 'Pencucian pakaian harian reguler', // Deskripsi dari layanan
            ],
            [ // Data layanan kedua
                'id' => 2, // ID layanan
                'nama_layanan' => 'Cuci Sepatu', // Nama dari layanan
                'harga' => 25000, // Harga layanan
                'durasi' => 180, // Waktu pengerjaan dalam menit
                'deskripsi' => 'Spa cuci sepatu bersih detail', // Deskripsi dari layanan
            ],
            [ // Data layanan ketiga
                'id' => 3, // ID layanan
                'nama_layanan' => 'Setrika Saja', // Nama dari layanan
                'harga' => 4000, // Harga layanan
                'durasi' => 60, // Waktu pengerjaan dalam menit
                'deskripsi' => 'Setrika rapi licin per kg', // Deskripsi dari layanan
            ],
        ];

        foreach ($layanans as $layanan) { // Melakukan perulangan untuk setiap data layanan dalam array
            Layanan::create($layanan); // Menyimpan data layanan ke dalam database
        }
    }
}

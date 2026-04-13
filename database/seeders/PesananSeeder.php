<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesanans = [
            [
                'id' => 1,
                'id_customer' => 1,
                'tanggal' => '2025-01-27',
                'status' => 'selesai',
                'metode_bayar' => 'qris',
            ],
            [
                'id' => 2,
                'id_customer' => 2,
                'tanggal' => '2025-01-27',
                'status' => 'selesai',
                'metode_bayar' => 'tunai',
            ],
            [
                'id' => 3,
                'id_customer' => 3,
                'tanggal' => '2025-01-27',
                'status' => 'selesai',
                'metode_bayar' => 'transfer',
            ],
        ];

        foreach ($pesanans as $pesanan) {
            Pesanan::create($pesanan);
        }
    }
}

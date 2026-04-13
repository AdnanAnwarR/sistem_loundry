<?php

namespace Database\Seeders;

use App\Models\DetailPesanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = [
            [
                'id_detail' => 1,
                'id_pesanan' => 1,
                'id_layanan' => 1,
                'id_pegawai' => 4,
                'berat_per_layanan' => 5,
            ],
            [
                'id_detail' => 2,
                'id_pesanan' => 1,
                'id_layanan' => 2,
                'id_pegawai' => 4,
                'berat_per_layanan' => 5,
            ],
            [
                'id_detail' => 3,
                'id_pesanan' => 1,
                'id_layanan' => 3,
                'id_pegawai' => 4,
                'berat_per_layanan' => 5,
            ],
            [
                'id_detail' => 4,
                'id_pesanan' => 2,
                'id_layanan' => 1,
                'id_pegawai' => 4,
                'berat_per_layanan' => 3,
            ],
            [
                'id_detail' => 5,
                'id_pesanan' => 2,
                'id_layanan' => 2,
                'id_pegawai' => 4,
                'berat_per_layanan' => 3,
            ],
            [
                'id_detail' => 6,
                'id_pesanan' => 3,
                'id_layanan' => 1,
                'id_pegawai' => 4,
                'berat_per_layanan' => 2,
            ],
            [
                'id_detail' => 7,
                'id_pesanan' => 3,
                'id_layanan' => 3,
                'id_pegawai' => 4,
                'berat_per_layanan' => 1,
            ],
        ];

        foreach ($details as $detail) {
            DetailPesanan::create($detail);
        }
    }
}

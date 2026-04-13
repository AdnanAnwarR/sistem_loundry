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
                'id_layanan' => 1,
                'nama_layanan' => 'cuci',
                'harga_per_kg' => 5000,
            ],
            [
                'id_layanan' => 2,
                'nama_layanan' => 'setrika',
                'harga_per_kg' => 5000,
            ],
            [
                'id_layanan' => 3,
                'nama_layanan' => 'packing',
                'harga_per_kg' => 3000,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}

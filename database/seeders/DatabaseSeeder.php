<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ // Memanggil seeder lain untuk dijalankan
            UserSeeder::class, // Menjalankan UserSeeder untuk mengisi data user
            LayananSeeder::class, // Menjalankan LayananSeeder untuk mengisi data layanan
            JadwalSeeder::class, // Menjalankan JadwalSeeder untuk mengisi data jadwal
            PesananSeeder::class, // Menjalankan PesananSeeder untuk mengisi data pesanan
        ]);
    }
}

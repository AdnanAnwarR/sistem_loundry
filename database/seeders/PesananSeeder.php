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
                'user_id' => 1,
                'layanan_id' => 1,
                'jadwal_id' => 1,
                'staf_id' => 4,
                'order_id' => 'ORD-001',
                'total_harga' => 5000,
                'catatan' => 'Tolong cucinya pisah warna ya',
                'status' => 'selesai',
                'status_pembayaran' => 'sudah_dibayar',
                'metode_bayar' => 'qris',
                'snap_token' => null,
                'rating' => 5,
                'ulasan' => 'Bersih dan wangi',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'layanan_id' => 2,
                'jadwal_id' => 1,
                'staf_id' => null, // belum diassign
                'order_id' => 'ORD-002',
                'total_harga' => 25000,
                'catatan' => 'Sepatu putih',
                'status' => 'pending',
                'status_pembayaran' => 'belum_dibayar',
                'metode_bayar' => null,
                'snap_token' => 'dummy-snap-token-2',
                'rating' => null,
                'ulasan' => null,
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'layanan_id' => 3,
                'jadwal_id' => 3,
                'staf_id' => 4,
                'order_id' => 'ORD-003',
                'total_harga' => 4000,
                'catatan' => null,
                'status' => 'proses',
                'status_pembayaran' => 'sudah_dibayar',
                'metode_bayar' => 'transfer',
                'snap_token' => null,
                'rating' => null,
                'ulasan' => null,
            ],
        ];

        foreach ($pesanans as $pesanan) {
            Pesanan::create($pesanan);
        }
    }
}

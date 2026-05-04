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
        $pesanans = [ // Membuat array berisi data pesanan yang akan di-seed
            [ // Data pesanan pertama
                'id' => 1, // ID pesanan
                'user_id' => 1, // ID user pelanggan yang memesan
                'layanan_id' => 1, // ID layanan yang dipesan
                'jadwal_id' => 1, // ID jadwal pesanan
                'staf_id' => 4, // ID user staf yang menangani pesanan
                'order_id' => 'ORD-001', // Nomor order (unik)
                'total_harga' => 5000, // Total harga pesanan
                'catatan' => 'Tolong cucinya pisah warna ya', // Catatan tambahan dari pelanggan
                'status' => 'selesai', // Status saat ini dari pesanan
                'status_pembayaran' => 'sudah_dibayar', // Status pembayaran pesanan
                'metode_bayar' => 'qris', // Metode pembayaran yang digunakan
                'snap_token' => null, // Token pembayaran (kosong jika sudah lunas)
                'rating' => 5, // Rating yang diberikan pelanggan
                'ulasan' => 'Bersih dan wangi', // Ulasan teks dari pelanggan
            ],
            [ // Data pesanan kedua
                'id' => 2, // ID pesanan
                'user_id' => 2, // ID user pelanggan yang memesan
                'layanan_id' => 2, // ID layanan yang dipesan
                'jadwal_id' => 1, // ID jadwal pesanan
                'staf_id' => null, // belum diassign // Belum ada staf yang ditugaskan
                'order_id' => 'ORD-002', // Nomor order (unik)
                'total_harga' => 25000, // Total harga pesanan
                'catatan' => 'Sepatu putih', // Catatan tambahan dari pelanggan
                'status' => 'pending', // Status saat ini dari pesanan (menunggu)
                'status_pembayaran' => 'belum_dibayar', // Status pembayaran pesanan
                'metode_bayar' => null, // Metode pembayaran belum dipilih
                'snap_token' => 'dummy-snap-token-2', // Token dummy untuk pembayaran
                'rating' => null, // Belum ada rating
                'ulasan' => null, // Belum ada ulasan
            ],
            [ // Data pesanan ketiga
                'id' => 3, // ID pesanan
                'user_id' => 3, // ID user pelanggan yang memesan
                'layanan_id' => 3, // ID layanan yang dipesan
                'jadwal_id' => 3, // ID jadwal pesanan
                'staf_id' => 4, // ID user staf yang menangani pesanan
                'order_id' => 'ORD-003', // Nomor order (unik)
                'total_harga' => 4000, // Total harga pesanan
                'catatan' => null, // Tidak ada catatan tambahan
                'status' => 'proses', // Status saat ini dari pesanan (sedang dikerjakan)
                'status_pembayaran' => 'sudah_dibayar', // Status pembayaran pesanan
                'metode_bayar' => 'transfer', // Metode pembayaran yang digunakan
                'snap_token' => null, // Token pembayaran (kosong)
                'rating' => null, // Belum ada rating
                'ulasan' => null, // Belum ada ulasan
            ],
        ];

        foreach ($pesanans as $pesanan) { // Melakukan perulangan untuk setiap data pesanan dalam array
            Pesanan::create($pesanan); // Menyimpan data pesanan ke dalam database
        }
    }
}

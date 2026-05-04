<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users: hapus pesanan jika user dihapus
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade'); // Relasi ke tabel layanan: hapus pesanan jika layanan dihapus
            $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade'); // Relasi ke tabel jadwal: hapus pesanan jika jadwal dihapus
            $table->foreignId('staf_id')->nullable()->constrained('users')->onDelete('set null'); // Relasi ke tabel users (untuk staf yang menangani), set null jika staf dihapus
            
            $table->string('order_id')->unique(); // Untuk Midtrans (e.g. ORD-123) // Kolom unik 'order_id' untuk keperluan integrasi payment gateway
            $table->decimal('total_harga', 10, 2); // Kolom 'total_harga' bertipe decimal (10 digit, 2 desimal)
            $table->text('catatan')->nullable(); // Kolom 'catatan' bertipe text, boleh kosong (opsional dari pelanggan)
            
            $table->enum('status', ['pending', 'dikonfirmasi', 'proses', 'selesai', 'dibatalkan', 'ditolak'])->default('pending'); // Status pesanan dengan nilai default 'pending'
            $table->enum('status_pembayaran', ['belum_dibayar', 'sudah_dibayar', 'gagal'])->default('belum_dibayar'); // Status pembayaran dengan nilai default 'belum_dibayar'
            $table->string('metode_bayar')->nullable(); // QRIS, Transfer, dll // Kolom metode pembayaran, boleh kosong pada awalnya
            $table->string('snap_token')->nullable(); // Token Midtrans // Kolom untuk menyimpan token dari Midtrans untuk popup pembayaran
            
            // Kolom ulasan
            $table->integer('rating')->nullable(); // Kolom 'rating' berupa angka (misal 1-5), boleh kosong jika belum dinilai
            $table->text('ulasan')->nullable(); // Kolom 'ulasan' teks panjang dari pelanggan, boleh kosong
            
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at'
            
            $table->index('status'); // Membuat index untuk mempercepat pencarian berdasarkan status pesanan
            $table->index('status_pembayaran'); // Membuat index untuk mempercepat pencarian berdasarkan status pembayaran
            $table->index('jadwal_id'); // Membuat index untuk mempercepat pencarian berdasarkan jadwal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
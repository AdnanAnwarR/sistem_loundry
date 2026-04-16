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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade');
            $table->foreignId('staf_id')->nullable()->constrained('users')->onDelete('set null');
            
            $table->string('order_id')->unique(); // Untuk Midtrans (e.g. ORD-123)
            $table->decimal('total_harga', 10, 2);
            $table->text('catatan')->nullable();
            
            $table->enum('status', ['pending', 'dikonfirmasi', 'proses', 'selesai', 'dibatalkan', 'ditolak'])->default('pending');
            $table->enum('status_pembayaran', ['belum_dibayar', 'sudah_dibayar', 'gagal'])->default('belum_dibayar');
            $table->string('metode_bayar')->nullable(); // QRIS, Transfer, dll 
            $table->string('snap_token')->nullable(); // Token Midtrans
            
            // Kolom ulasan
            $table->integer('rating')->nullable();
            $table->text('ulasan')->nullable();
            
            $table->timestamps();
            
            $table->index('status');
            $table->index('status_pembayaran');
            $table->index('jadwal_id');
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
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
        // 1. Buat pivot table detail_pesanan
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanan')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->timestamps();
        });

        // 2. Hapus layanan_id dari pesanan
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign(['layanan_id']);
            $table->dropColumn('layanan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback tabel pesanan (menambahkan kembali layanan_id)
        Schema::table('pesanan', function (Blueprint $table) {
            $table->foreignId('layanan_id')->nullable()->constrained('layanan')->onDelete('cascade');
        });

        // Drop tabel detail_pesanan
        Schema::dropIfExists('detail_pesanan');
    }
};

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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key
            $table->date('tanggal'); // Membuat kolom 'tanggal' bertipe date untuk tanggal jadwal
            $table->string('slot_waktu'); // Membuat kolom 'slot_waktu' bertipe string (contoh: "08:00 - 10:00")
            $table->integer('kapasitas')->default(1); // Membuat kolom 'kapasitas' bertipe integer, default 1
            $table->integer('terisi')->default(0); // Membuat kolom 'terisi' bertipe integer, default 0 (belum ada pesanan)
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at'
            
            $table->index('tanggal'); // Menambahkan index pada kolom 'tanggal' untuk mempercepat pencarian jadwal berdasarkan tanggal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};

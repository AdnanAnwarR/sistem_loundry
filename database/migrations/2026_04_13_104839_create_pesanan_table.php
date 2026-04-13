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
            $table->id(); // id_pesanan (auto increment)
            $table->foreignId('id_customer')->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['pending', 'proses', 'selesai', 'diambil'])->default('pending');
            $table->enum('metode_bayar', ['tunai', 'qris', 'transfer'])->nullable();
            $table->timestamps();
            
            // Optional: index untuk performance
            $table->index('tanggal');
            $table->index('status');
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
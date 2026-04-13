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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id('id_detail'); // D-001, D-002 dll (auto increment)
            $table->foreignId('id_pesanan')->constrained('pesanan')->onDelete('cascade');
            $table->unsignedBigInteger('id_layanan');
            $table->foreign('id_layanan')->references('id_layanan')->on('layanan')->onDelete('cascade');
            $table->foreignId('id_pegawai')->constrained('users')->onDelete('cascade');
            $table->decimal('berat_per_layanan', 8, 2); // dalam kg, misal: 5.00, 2.50
            $table->timestamps();
            
            // Index untuk performance
            $table->index('id_pesanan');
            $table->index('id_layanan');
            $table->index('id_pegawai');
            
            // Optional: unique constraint agar tidak double input
            // $table->unique(['id_pesanan', 'id_layanan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};
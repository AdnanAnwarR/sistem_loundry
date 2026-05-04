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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key
            $table->string('nama_layanan'); // Membuat kolom 'nama_layanan' bertipe string
            $table->decimal('harga', 10, 2); // Membuat kolom 'harga' bertipe decimal (10 digit total, 2 di belakang koma)
            $table->integer('durasi')->default(60)->comment('Durasi dalam menit'); // Membuat kolom 'durasi' bertipe integer, default 60 (menit)
            $table->text('deskripsi')->nullable(); // Membuat kolom 'deskripsi' bertipe text, boleh kosong
            $table->string('foto')->nullable(); // Membuat kolom 'foto' bertipe string untuk path gambar, boleh kosong
            $table->boolean('is_active')->default(true); // Membuat kolom 'is_active' untuk status layanan, default aktif (true)
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at'
            
            $table->index('nama_layanan'); // Menambahkan index pada kolom 'nama_layanan' untuk mempercepat query pencarian
            $table->index('is_active'); // Menambahkan index pada kolom 'is_active' untuk mempercepat query filter layanan aktif
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
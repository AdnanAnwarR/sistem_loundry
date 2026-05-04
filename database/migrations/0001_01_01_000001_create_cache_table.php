<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Method ini dijalankan saat Anda mengetik perintah 'php artisan migrate'.
     */
    public function up(): void
    {
        // Membuat tabel bernama 'cache' untuk menyimpan data sementara aplikasi
        Schema::create('cache', function (Blueprint $table) {
            // Kolom 'key' sebagai string dan sekaligus Primary Key (identitas unik data cache)
            $table->string('key')->primary();
            
            // Kolom 'value' menggunakan mediumText untuk menyimpan data cache yang isinya bisa cukup besar/panjang
            $table->mediumText('value');
            
            // Kolom 'expiration' untuk menyimpan waktu kadaluarsa (timestamp unix)
            // Diberi .index() agar pencarian data yang belum expired oleh Laravel menjadi lebih cepat
            $table->integer('expiration')->index();
        });

        // Membuat tabel 'cache_locks' untuk fitur Atomic Locks (mencegah race condition)
        Schema::create('cache_locks', function (Blueprint $table) {
            // Kolom 'key' sebagai Primary Key untuk mengidentifikasi resource yang sedang dikunci
            $table->string('key')->primary();
            
            // Kolom 'owner' untuk menyimpan token identitas siapa (proses mana) yang memegang kunci tersebut
            $table->string('owner');
            
            // Kolom 'expiration' untuk menentukan kapan kunci ini otomatis dilepas jika tidak diperbarui
            $table->integer('expiration')->index();
        });
    }

    /**
     * Reverse the migrations.
     * Method ini dijalankan saat Anda melakukan 'php artisan migrate:rollback'.
     */
    public function down(): void
    {
        // Menghapus tabel 'cache' jika ada
        Schema::dropIfExists('cache');
        
        // Menghapus tabel 'cache_locks' jika ada
        Schema::dropIfExists('cache_locks');
    }
};
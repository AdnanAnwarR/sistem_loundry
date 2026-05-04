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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key (auto increment)
            $table->string('name'); // Membuat kolom 'name' dengan tipe data string (varchar)
            $table->string('email')->unique(); // Membuat kolom 'email' yang unik (tidak boleh ada yang sama)
            $table->string('no_hp')->unique(); // Membuat kolom 'no_hp' yang unik untuk nomor handphone
            $table->enum('role', ['pelanggan', 'staff', 'admin'])->default('pelanggan'); // Membuat kolom 'role' dengan pilihan pelanggan, staff, admin. Nilai defaultnya 'pelanggan'
            $table->boolean('is_active')->default(true); // Membuat kolom 'is_active' bertipe boolean untuk status aktif user, default true
            $table->timestamp('email_verified_at')->nullable(); // Membuat kolom 'email_verified_at' untuk waktu verifikasi email, boleh kosong (nullable)
            $table->string('password'); // Membuat kolom 'password' untuk menyimpan kata sandi (akan di-hash)
            $table->rememberToken(); // Membuat kolom 'remember_token' untuk fitur "remember me" saat login
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' secara otomatis
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Membuat kolom 'email' sebagai primary key di tabel ini
            $table->string('token'); // Membuat kolom 'token' untuk menyimpan token reset password
            $table->timestamp('created_at')->nullable(); // Membuat kolom 'created_at' untuk waktu pembuatan token, boleh kosong
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Membuat kolom 'id' sebagai primary key untuk session
            $table->foreignId('user_id')->nullable()->index(); // Membuat kolom 'user_id' sebagai foreign key yang merujuk ke tabel users, boleh kosong dan diberi index
            $table->string('ip_address', 45)->nullable(); // Membuat kolom 'ip_address' maksimal 45 karakter, boleh kosong
            $table->text('user_agent')->nullable(); // Membuat kolom 'user_agent' bertipe text untuk menyimpan info browser/perangkat, boleh kosong
            $table->longText('payload'); // Membuat kolom 'payload' bertipe longText untuk menyimpan data session
            $table->integer('last_activity')->index(); // Membuat kolom 'last_activity' bertipe integer dan diberi index untuk pencarian cepat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

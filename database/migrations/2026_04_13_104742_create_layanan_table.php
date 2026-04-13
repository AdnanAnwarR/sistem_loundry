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
            $table->id('id_layanan'); // L001, L002, L003 (auto increment)
            $table->string('nama_layanan'); // cuci, setrika, packing
            $table->decimal('harga_per_kg', 10, 2); // 5000.00, 3000.00
            $table->text('deskripsi')->nullable(); // optional: deskripsi layanan
            $table->boolean('is_active')->default(true); // optional: untuk nonaktifkan layanan
            $table->timestamps();
            
            // Index untuk performance
            $table->index('nama_layanan');
            $table->index('is_active');
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
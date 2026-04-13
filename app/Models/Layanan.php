<?php

namespace App\Models;

use App\Models\DetailPesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    // Primary key custom (karena pakai 'id_layanan' bukan 'id')
    protected $primaryKey = 'id_layanan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_layanan',
        'harga_per_kg',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'harga_per_kg' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relasi ke detail pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_layanan', 'id_layanan');
    }

    // Scope untuk layanan aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    // Primary key custom (default id)
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_layanan',
        'harga',
        'durasi',
        'deskripsi',
        'foto',
        'is_active',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'durasi' => 'integer',
        'is_active' => 'boolean',
    ];

    // Relasi many-to-many ke pesanan
    public function pesanans()
    {
        return $this->belongsToMany(Pesanan::class, 'detail_pesanan', 'layanan_id', 'pesanan_id')->withTimestamps();
    }

    // Scope untuk layanan aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
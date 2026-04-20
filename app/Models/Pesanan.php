<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'jadwal_id',
        'staf_id',
        'order_id',
        'total_harga',
        'catatan',
        'status',
        'status_pembayaran',
        'metode_bayar',
        'snap_token',
        'rating',
        'ulasan',
    ];

    protected $casts = [
        'total_harga' => 'decimal:2',
    ];

    // Relasi ke user (pelanggan)
    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi many-to-many ke layanan
    public function layanans()
    {
        return $this->belongsToMany(Layanan::class, 'detail_pesanan', 'pesanan_id', 'layanan_id')->withTimestamps();
    }

    // Relasi ke jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    // Relasi ke staf pengelola
    public function staf()
    {
        return $this->belongsTo(User::class, 'staf_id');
    }

    // Scope berdasarkan status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope berdasarkan status pembayaran
    public function scopeStatusPembayaran($query, $status)
    {
        return $query->where('status_pembayaran', $status);
    }
}
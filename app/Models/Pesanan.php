<?php

namespace App\Models;

use App\Models\DetailPesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_customer',
        'tanggal',
        'status',
        'metode_bayar',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relasi ke user (customer)
    public function customer()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    // Relasi ke detail pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan');
    }

    // Relasi ke layanan melalui detail pesanan
    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'detail_pesanan', 'id_pesanan', 'id_layanan')
                    ->withPivot('berat_per_layanan', 'id_pegawai')
                    ->withTimestamps();
    }

    // Hitung total harga pesanan
    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->detailPesanan as $detail) {
            $total += $detail->berat_per_layanan * $detail->layanan->harga_per_kg;
        }
        return $total;
    }

    // Scope berdasarkan status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope berdasarkan tanggal
    public function scopeTanggal($query, $tanggal)
    {
        return $query->whereDate('tanggal', $tanggal);
    }
}
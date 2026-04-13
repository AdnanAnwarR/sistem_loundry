<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';
    protected $primaryKey = 'id_detail';
    public $incrementing = true;

    protected $fillable = [
        'id_pesanan',
        'id_layanan',
        'id_pegawai',
        'berat_per_layanan',
    ];

    protected $casts = [
        'berat_per_layanan' => 'decimal:2',
    ];

    // Relasi ke pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }

    // Relasi ke layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id_layanan');
    }

    // Relasi ke pegawai (user)
    public function pegawai()
    {
        return $this->belongsTo(User::class, 'id_pegawai');
    }

    // Hitung subtotal per detail
    public function getSubtotalAttribute()
    {
        return $this->berat_per_layanan * $this->layanan->harga_per_kg;
    }
}
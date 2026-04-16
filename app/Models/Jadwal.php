<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'tanggal',
        'slot_waktu',
        'kapasitas',
        'terisi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relasi ke pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'jadwal_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailPesanan extends Pivot
{
    protected $table = 'detail_pesanan';

    protected $fillable = [
        'pesanan_id',
        'layanan_id',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}

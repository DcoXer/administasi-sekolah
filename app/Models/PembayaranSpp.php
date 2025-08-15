<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranSpp extends Model
{
    protected $fillable = [
        'siswa_id', 'bulan', 'tahun', 'tanggal_bayar', 'jumlah', 'status'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}


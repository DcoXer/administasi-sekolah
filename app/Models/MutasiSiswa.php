<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiSiswa extends Model
{
    use HasFactory;

    protected $table = 'mutasi_siswa';

    protected $fillable = [
        'siswa_id',
        'alasan',
        'tujuan_sekolah',
        'status',
        'keterangan_penolakan',
        'tanggal_pengajuan',
        'tanggal_persetujuan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}

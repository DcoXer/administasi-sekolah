<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranDaftarUlang extends Model
{
    protected $table = 'pembayaran_daftar_ulangs';

    protected $fillable = [
        'nama_siswa', // ini isinya ID siswa ya bro
        'tahun_ajaran',
        'nominal',
        'status',
    ];

    public function siswa()
    {
        // 'nama_siswa' adalah foreign key di tabel ini yang mengacu ke kolom 'id' di tabel siswa
        return $this->belongsTo(Siswa::class, 'nama_siswa', 'id');
    }
}

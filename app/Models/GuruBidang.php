<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruBidang extends Model
{
    use HasFactory;

    protected $table = 'guru_bidang';

    protected $fillable = [
        'guru_id',
        'bidang_id',
        'kelas',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function bidang()
    {
        return $this->belongsTo(BidangStudi::class, 'bidang_id');
    }

    public function nilaiSiswa()
    {
        return $this->hasMany(NilaiSiswa::class, 'guru_bidang_id');
    }

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'nilai_siswas', 'guru_bidang_id', 'siswa_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa', 
        'nisn',
        'nik',
        'kelas_id',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'nama_wali'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nilaiPTS()
    {
        return $this->hasMany(NilaiPTS::class);
    }

    public function raportPTS()
    {
        return $this->hasMany(RaportPTS::class);
    }
    
    public function daftarUlang()
    {
        return $this->hasMany(PembayaranDaftarUlang::class);
    }
}

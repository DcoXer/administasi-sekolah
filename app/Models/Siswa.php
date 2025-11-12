<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'nisn',
        'nik',
        'kelas',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'nama_wali'
    ];

    public function daftarUlang()
    {
        return $this->hasMany(PembayaranDaftarUlang::class);
    }

    public function nilaiSiswa()
    {
        return $this->hasMany(NilaiSiswa::class);
    }

    public function raports()
    {
        return $this->hasMany(Raport::class);
    }
}
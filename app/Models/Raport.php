<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;

    protected $table = 'raports';

    protected $fillable = [
        'siswa_id',
        'semester',
        'tahun_ajaran',
        'nilai_rata_rata',
        'wali_kelas_id',
        'catatan_wali_kelas',
        'catatan_kepala_sekolah',
        'sudah_dicetak',
        'tanggal_cetak',
    ];

    protected $casts = [
        'nilai_rata_rata' => 'float',
        'sudah_dicetak' => 'boolean',
        'tanggal_cetak' => 'datetime',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }

    public function nilaiSiswa()
    {
        return $this->hasManyThrough(
            NilaiSiswa::class,
            GuruBidang::class,
            'id',
            'guru_bidang_id',
            'id'
        )->where('siswa_id', $this->siswa_id);
    }

    // Calculate average grade
    public function calculateRataRata()
    {
        $nilaiTotal = NilaiSiswa::where('siswa_id', $this->siswa_id)->avg('nilai_akhir');
        $this->nilai_rata_rata = round($nilaiTotal, 2);
        return $this->nilai_rata_rata;
    }

    // Get all grades for this raport
    public function getAllNilai()
    {
        return NilaiSiswa::where('siswa_id', $this->siswa_id)
            ->with('guruBidang.bidang', 'guruBidang.guru')
            ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;

    protected $table = 'nilai_siswas';

    protected $fillable = [
        'siswa_id',
        'guru_bidang_id',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
        'grade',
        'catatan_guru',
    ];

    protected $casts = [
        'nilai_akhir' => 'float',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guruBidang()
    {
        return $this->belongsTo(GuruBidang::class, 'guru_bidang_id');
    }

    // Calculate final grade based on formula: (tugas*20% + uts*30% + uas*50%)
    public function calculateNilaiAkhir()
    {
        if ($this->nilai_tugas && $this->nilai_uts && $this->nilai_uas) {
            $this->nilai_akhir = ($this->nilai_tugas * 0.2) + ($this->nilai_uts * 0.3) + ($this->nilai_uas * 0.5);
            $this->grade = $this->getGrade($this->nilai_akhir);
            return $this->nilai_akhir;
        }
        return null;
    }

    public function getGrade($nilai)
    {
        if ($nilai >= 85) return 'A';
        if ($nilai >= 75) return 'B';
        if ($nilai >= 65) return 'C';
        if ($nilai >= 55) return 'D';
        return 'E';
    }
}

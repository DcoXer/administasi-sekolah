<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nama',
        'nip',
        'mapel',
        'jabatan',
        'jenis_kelamin',
        'no_hp', // ✅ pastikan ada ini
    ];

    public function guruBidang()
    {
        return $this->hasMany(GuruBidang::class);
    }

    public function raportsAsWaliKelas()
    {
        return $this->hasMany(Raport::class, 'wali_kelas_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangStudi extends Model
{
    use HasFactory;

    protected $table = 'bidang_studi';

    protected $fillable = [
        'nama_bidang',
        'kode_bidang',
        'deskripsi',
    ];

    public function guruBidang()
    {
        return $this->hasMany(GuruBidang::class, 'bidang_id');
    }

    public function nilai()
    {
        return $this->hasManyThrough(NilaiSiswa::class, GuruBidang::class, 'bidang_id', 'guru_bidang_id');
    }
}

<?php

namespace App\Imports;

use App\Models\PembayaranSpp;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PembayaranSppImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cari siswa by nama
        $siswa = Siswa::where('nama', $row['nama_siswa'])->first();

        return new PembayaranSpp([
            'siswa_id'      => $siswa?->id,
            'tanggal_bayar' => $row['tanggal_bayar'],
            'tahun'         => $row['tahun'],
            'bulan'         => $row['bulan'],
            'jumlah'        => $row['jumlah'],
            'status'        => $row['status'],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\PembayaranDaftarUlang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PembayaranDaftarUlangImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new PembayaranDaftarUlang([
            'nama_siswa'   => $row['nama_siswa'],   // Pastikan header Excel sesuai
            'tahun_ajaran' => $row['tahun_ajaran'],
            'nominal'      => $row['nominal'],
            'status'       => $row['status']
        ]);
    }
}

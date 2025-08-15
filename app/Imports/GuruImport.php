<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Guru([
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'mapel' => $row['mapel'],
            'jabatan' => $row['jabatan'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'no_hp' => $row['no_hp'],
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Guru::select('nama', 'nip', 'mapel', 'jabatan', 'jenis_kelamin', 'no_hp')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NIP', 'Mapel', 'Jabatan', 'Jenis Kelamin', 'No HP'];
    }
}

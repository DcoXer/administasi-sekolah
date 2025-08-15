<?php

namespace App\Exports;

use App\Models\PembayaranDaftarUlang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranDaftarUlangExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PembayaranDaftarUlang::with('siswa')
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Siswa'   => $item->siswa ? $item->siswa->nama : '-',
                    'Tahun Ajaran' => $item->tahun_ajaran,
                    'Nominal'      => $item->nominal,
                    'Status'       => $item->status,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Tahun Ajaran',
            'Nominal',
            'Status'
        ];
    }
}

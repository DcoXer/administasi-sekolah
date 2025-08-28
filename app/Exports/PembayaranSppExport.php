<?php

namespace App\Exports;

use App\Models\PembayaranSpp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranSppExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PembayaranSpp::with('siswa')
            ->get()
            ->map(fn($item) => [
                'Nama Siswa'   => $item->siswa->nama ?? '-',
                'Tanggal Bayar' => $item->tanggal_bayar,
                'Tahun'        => $item->tahun,
                'Bulan'        => $item->bulan,
                'Jumlah'       => $item->jumlah,
                'Status'       => $item->status,
            ]);
    }

    public function headings(): array
    {
        return ['Nama Siswa', 'Tanggal Bayar', 'Tahun', 'Bulan', 'Jumlah', 'Status'];
    }
}

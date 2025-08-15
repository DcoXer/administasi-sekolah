<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithValidation;

class SiswaImport implements ToModel, WithHeadingRow, SkipsOnFailure, WithValidation
{
    use SkipsFailures;

    public function model(array $row)
    {
        // ✅ Skip baris kalau nama kosong atau tidak ada
        if (empty($row['nama'])) {
            Log::warning('⚠️ Baris dilewati karena nama kosong: ' . json_encode($row));
            return null;
        }

        try {
            return new Siswa([
                'nama'          => $row['nama'] ?? '',
                'nisn'          => $row['nisn'] ?? '',
                'nik'           => $row['nik'] ?? '',
                'kelas'         => $row['kelas'] ?? '',
                'tempat_lahir'  => $row['tempat_lahir'] ?? '',
                'tanggal_lahir' => $row['tanggal_lahir'] ?? null,
                'jenis_kelamin' => $row['jenis_kelamin'] ?? '',
                'alamat'        => $row['alamat'] ?? '',
                'nama_ayah'     => $row['nama_ayah'] ?? '',
                'nama_ibu'      => $row['nama_ibu'] ?? '',
                'nama_wali'     => $row['nama_wali'] ?? '',
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Gagal import baris: ' . json_encode($row) . ' | Error: ' . $e->getMessage());
            return null;
        }
    }

    public function rules(): array
    {
        return [
            '*.nama'  => 'required|string',
            '*.nisn'  => 'required|string',
            '*.nik'   => 'required|string',
            '*.kelas' => 'required|string',
        ];
    }
}

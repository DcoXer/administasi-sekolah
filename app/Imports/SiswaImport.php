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
        // FIX: Hilangin spasi yang bikin error
        if (empty($row['nama_siswa'])) {
            Log::warning('⚠️ Baris dilewati karena nama siswa tidak ada: ' . json_encode($row));
            return null;
        }

        // Cegah crash karena unique NISN & NIK
        return Siswa::firstOrCreate(
            [
                'nisn' => $row['nisn'], // unique NISN
            ],
            [
                'nik'            => $row['nik'] ?? null,
                'nama_siswa'     => $row['nama_siswa'] ?? null,
                'kelas_id'       => $row['kelas_id'] ?? null,
                'tempat_lahir'   => $row['tempat_lahir'] ?? null,
                'tanggal_lahir'  => $row['tanggal_lahir'] ?? null,
                'jenis_kelamin'  => $row['jenis_kelamin'] ?? null,
                'alamat'         => $row['alamat'] ?? null,
                'nama_ayah'      => $row['nama_ayah'] ?? null,
                'nama_ibu'       => $row['nama_ibu'] ?? null,
                'nama_wali'      => $row['nama_wali'] ?? null,
            ]
        );
    }

    public function rules(): array
    {
        return [
            '*.nisn'           => 'required|string',
            '*.nik'            => 'required|string',
            '*.nama_siswa'     => 'required|string',
            '*.kelas_id'       => 'required',
            '*.tempat_lahir'   => 'required|string',
            '*.tanggal_lahir'  => 'required|date',
            '*.jenis_kelamin'  => 'required|string',
            '*.alamat'         => 'nullable|string',
            '*.nama_ayah'      => 'nullable|string',
            '*.nama_ibu'       => 'nullable|string',
            '*.nama_wali'      => 'nullable|string',
        ];
    }
}

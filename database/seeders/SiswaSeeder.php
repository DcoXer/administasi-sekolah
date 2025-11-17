<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = Kelas::first();

        $siswaData = [
            [
                'nisn' => '1234567890',
                'nik' => '3201123456789012',
                'nama_siswa' => 'Ahmad Fauzi',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2010-05-15',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Merpati No. 10',
                'nama_ayah' => 'Budi',
                'nama_ibu' => 'Siti',
                'kelas_id' => $kelas?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0987654321',
                'nik' => '3201987654321098',
                'nama_siswa' => 'Siti Aminah',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2010-08-20',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Kenanga No. 5',
                'nama_ayah' => 'Joko',
                'nama_ibu' => 'Dewi',
                'kelas_id' => $kelas?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($siswaData as $data) {
            Siswa::firstOrCreate([
                'nama_siswa' => $data['nama_siswa'],
                'tanggal_lahir' => $data['tanggal_lahir'],
            ], $data);
        }
    }
}

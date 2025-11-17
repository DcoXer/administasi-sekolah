<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\User;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wali = User::whereHas('roles', fn($q) => $q->where('name', 'wali_kelas'))->first();

        Kelas::firstOrCreate([
            'nama_kelas' => '1A',
            'wali_kelas_id' => $wali?->id,
        ]);
    }   
}

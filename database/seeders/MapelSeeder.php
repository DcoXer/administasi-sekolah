<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;
use App\Models\User;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = User::whereHas('roles', fn($q) => $q->where('name', 'guru_bidang'))->first();

        $mapels = [
            "Matematika",
            "Bahasa Indonesia",
            "IPA",
            "IPS"
        ];

        foreach ($mapels as $m) {
            Mapel::firstOrCreate([
                'nama_mapel' => $m,
                'guru_id' => $guru?->id,
            ]);
        }
    }
}

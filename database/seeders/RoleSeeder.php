<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'operator', 'display_name' => 'Operator'],
            ['name' => 'kepala_madrasah', 'display_name' => 'Kepala Madrasah'],
            ['name' => 'staff_keuangan', 'display_name' => 'Staff Keuangan'],
            ['name' => 'wali_kelas', 'display_name' => 'Wali Kelas'],
            ['name' => 'guru_bidang', 'display_name' => 'Guru Bidang'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name'=> $role['name']], $role);
        }
    }
}

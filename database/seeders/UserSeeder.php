<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Operator',
                'email' => 'operator@sekolah.com',
                'password' => Hash::make('password'),
                'role' => 'operator',
            ],
            [
                'name' => 'Kepala Madrasah',
                'email' => 'kamad@sekolah.com',
                'password' => Hash::make('password'),
                'role' => 'kepala_madrasah',
            ],
            [
                'name' => 'Staff Keuangan',
                'email' => 'keuangan@sekolah.com',
                'password' => Hash::make('password'),
                'role' => 'staff_keuangan',
            ],
            [
                'name' => 'Wali Kelas 1A',
                'email' => 'wali1a@sekolah.com',
                'password' => Hash::make('password'),
                'role' => 'wali_kelas',
            ],
            [
                'name' => 'Guru Matematika',
                'email' => 'guru.mtk@sekolah.com',
                'password' => Hash::make('password'),
                'role' => 'guru_bidang',
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => $data['password'],
                    'role' => $data['role'],
                ]
            );
        }
    }
}

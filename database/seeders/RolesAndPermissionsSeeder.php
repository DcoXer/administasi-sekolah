<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // define permissions
        $permissions = [
            'manage_all', // full CRUD
            'monitoring',
            'approve_raport',
            'input_mapel',
            'cetak_raport',
            'input_nilai',
            'input_pembayaran',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // create roles and assign existing permissions
        $operator = Role::firstOrCreate(['name' => 'operator']);
        $operator->givePermissionTo(Permission::all());

        $kepala = Role::firstOrCreate(['name' => 'kepala_madrasah']);
        $kepala->givePermissionTo(['monitoring', 'approve_raport']);

        $wali = Role::firstOrCreate(['name' => 'wali_kelas']);
        // wali for kelas 1-3 can input mapel & cetak, for 4-6 only cetak — application logic will check class
        $wali->givePermissionTo(['input_mapel', 'cetak_raport']);

        $guru = Role::firstOrCreate(['name' => 'guru_bidang']);
        $guru->givePermissionTo(['input_nilai']);

        $finance = Role::firstOrCreate(['name' => 'staff_keuangan']);
        $finance->givePermissionTo(['input_pembayaran']);
    }
}

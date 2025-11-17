<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            MapelSeeder::class,
        ]);
=======
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(\Database\Seeders\RolesAndPermissionsSeeder::class);
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
    }
}

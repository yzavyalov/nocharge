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
=======
        $this->call([
            RolesSeeder::class,
            TestUserSeeder::class,
            SuperAdminSeeder::class,
        ]);

>>>>>>> 2c834df24b0f0b6f1633d56f1315cd3c697d6124
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

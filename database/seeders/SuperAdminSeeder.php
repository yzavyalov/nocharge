<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'name' => 'SuperAdmin',
            'email' => '8540462@gmail.com',
            'password' => 'Nocharge356!',
        ],
        [
            'name' => 'SecondAdmin',
            'email' => 'iafs76@proton.me',
            'password' => 'Iafs346!',
        ],
                ];


        foreach ($data as $userData) {

            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);

            $user->removeRole('user-testing');
            $user->assignRole('redaktor');
        }
    }
}

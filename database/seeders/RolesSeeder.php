<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Commands\CreateRole;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'redaktor',
            ],
            [
                'name' => 'user-admin',
            ],
            [
                'name' => 'user-employee',
            ],
            [
                'name' => 'user-testing',
            ],
        ];

        foreach($datas as $data)

            Role::create([
                'name' => $data['name'],
            ]);

    }
}

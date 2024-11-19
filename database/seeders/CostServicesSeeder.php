<?php

namespace Database\Seeders;

use App\Models\CostService;
use Illuminate\Database\Seeder;

class CostServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'token one month',
                'price_usdt' => '300'
            ],
            [
                'name' => 'token three month',
                'price_usdt' => '800'
            ],
            [
                'name' => 'token twelve month',
                'price_usdt' => '3000'
            ],
            [
                'name' => 'one request to sanction list',
                'price_usdt' => '0.13'
            ],
            [
                'name' => 'one request to take adres',
                'price_usdt' => '0.05'
            ],
        ];

        foreach($datas as $data)

            CostService::create([
                'name' => $data['name'],
                'price_usdt' => $data['price_usdt'],
            ]);
    }
}

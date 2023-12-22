<?php

namespace Database\Seeders;

use App\Enums\PartnersTypeEnum;
use App\Models\CheckUser;
use App\Models\Partners;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partners::create([
            'name' => 'TestCompany',
            'type' => PartnersTypeEnum::OTHER,
        ]);

        CheckUser::create([
            'email' => hash('sha256', 'test@test.com'),
            'ip' => '127.0.0.1',
            'browser' => 'Opera 5.0.1',
            'agent' => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 (.NET CLR 3.5.30729)',
            'platform' => 'Windows',
            'owner_partner' => 1,
        ]);
    }
}

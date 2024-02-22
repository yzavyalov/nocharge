<?php

namespace App\Imports;

use App\Http\Helper\PartnerHelper;
use App\Models\CheckUser;
use App\Services\CheckUserService;
use App\Services\EncryptService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CheckUsersExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $headerSkipped = false;

        foreach ($rows as $row)
        {
            // Пропускаем первую строку (заголовок столбцов)
            if (!$headerSkipped) {
                $headerSkipped = true;
                continue;
            }


            // Проверяем, что email является действительным
            $email = $row[0];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception('Invalid email format: ' . $email);
            }

            // Проверяем другие поля, если необходимо

            // Проверяем, существует ли пользователь с таким email
            $user = CheckUser::query()->where('email', EncryptService::coding($email))->first();

            // Если пользователь не существует, создаем нового
            if (!$user)
            {
                CheckUser::create([
                    'email' => EncryptService::coding($email),
                    'ip' => $row[1],
                    'browser' => $row[2],
                    'agent' => $row[3],
                    'platform' => $row[4],
                    'owner_partner' => session()->get('partner_id'),
                ]);
            }
        }
    }


}

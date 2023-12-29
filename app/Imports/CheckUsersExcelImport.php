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
        foreach ($rows as $row)
        {
            $user = CheckUser::query()->where('email',EncryptService::coding($row[0]))->first();

            if (!isset($user))
            {
                CheckUser::create([
                    'email' => EncryptService::coding($row[0]),
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

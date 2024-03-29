<?php

namespace App\Services;

use App\Enums\QuantityCheckUsersTypeEnum;
use App\Http\Requests\UserChangeRequest;
use App\Models\CheckUser;
use App\Models\Partners;
use App\Models\Quantity_user_request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckUserService
{
    public function create($usersData, $partnerId)
    {
        foreach ($usersData as $userData)
        {
            if($userData['email'])
                $email = EncryptService::coding($userData['email']);

            $owner_partner = Partners::query()->find($partnerId);

            isset($userData['ip']) ? $ip = $userData['ip'] : $ip = null;

            isset($userData['browser']) ? $browser = $userData['browser'] : $browser = null;

            isset($userData['agent']) ? $agent = $userData['agent'] : $agent = null;

            isset($userData['platform']) ? $platform = $userData['platform'] : $platform = null;

            $checkUser = CheckUser::query()->where('email',$email)->first();

            if (isset($checkUser) && $checkUser->count()>0)
            {
                if (!isset($checkUser->ip) || !isset($checkUser->browser) || !isset($checkUser->agent) || !isset($checkUser->platform))
                {
                    $checkUser->update([
                        'ip' => $ip,
                        'browser' => $browser,
                        'agent' => $agent,
                        'platform' => $platform,
                    ]);
                }
                $user = $owner_partner->admin->first();
                Quantity_user_request::create([
                    'user_id' => $user->id,
                    'partner_id' => $owner_partner->id,
                    'check_user_id' => $checkUser->id,
                    'type' => QuantityCheckUsersTypeEnum::DOWNLOAD,
                ]);
            }
            else
            {
                isset($userData['ip']) ? $ip = $userData['ip'] : $ip = null;
                isset($userData['browser']) ? $browser = $userData['browser'] : $browser = null;
                isset($userData['agent']) ? $agent = $userData['agent'] : $agent = null;
                isset($userData['platform']) ? $platform = $userData['platform'] : $platform = null;

                $newCheckUser = CheckUser::create([
                    'email' => $email,
                    'ip' => $ip,
                    'browser' => $browser,
                    'agent' => $agent,
                    'platform' => $platform,
                    'owner_partner' => $owner_partner->id,
                ]);

                Quantity_user_request::create([
                    'user_id' => $user->id,
                    'partner_id' => $owner_partner->id,
                    'check_user_id' => $newCheckUser->id,
                    'type' => QuantityCheckUsersTypeEnum::DOWNLOAD,
                ]);
            }
        }
    }


    public function checkGroupUsers($request)
    {
        $usersData = $request->all();

        $coincidence = [];

        $mismatch = [];

        foreach ($usersData as $userData)
        {
                $email = EncryptService::coding($userData['email']);

                $user = CheckUser::query()->where('email',$email)->first();

                if (isset($user))
                {
                    $coincidence[] = $userData;
                    Quantity_user_request::create([
                        'user_id' => 1,
                        'partner_id' => session()->get('partner_id'),
                        'check_user_id' => $user->id,
                        'type' => QuantityCheckUsersTypeEnum::CHECKED,
                    ]);
                }
                else
                {
                    $mismatch[] = $userData;
                }
        }

        return ['coincidence' => $coincidence, 'mismatch' => $mismatch];
    }
}

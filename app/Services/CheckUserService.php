<?php

namespace App\Services;

use App\Enums\QuantityCheckUsersTypeEnum;
use App\Http\Controllers\Cabinet\LudomanController;
use App\Http\Requests\UserChangeRequest;
use App\Http\Resources\CheckUserResource;
use App\Models\CheckUser;
use App\Models\Ludoman;
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
            if(isset($userData['email'])) {
                $email = EncryptService::coding($userData['email']);
            } else {
                // Если email не установлен, пропускаем итерацию
                continue;
            }

            $owner_partner = PartnerService::checkParnter($partnerId);

            // Устанавливаем значения с помощью тернарного оператора
            $ip = $userData['ip'] ?? null;
            $browser = $userData['browser'] ?? null;
            $agent = $userData['agent'] ?? null;
            $platform = $userData['platform'] ?? null;

            $checkUser = CheckUser::query()->where('email', $email)->first();

            if ($checkUser) // Убедитесь, что объект найден
            {
                if (!$checkUser->ip || !$checkUser->browser || !$checkUser->agent || !$checkUser->platform)
                {
                    $checkUser->update([
                        'ip' => $ip,
                        'browser' => $browser,
                        'agent' => $agent,
                        'platform' => $platform,
                    ]);
                }
                $user = $owner_partner->admin->first();
                // Проверьте, что $user не null
                if ($user) {
                   $this->createQuantityUserRequest($user->id,$owner_partner->id,$checkUser->id);
                }
            }
            else
            {
                // Создаем нового пользователя CheckUser
                $newCheckUser = CheckUser::create([
                    'email' => $email,
                    'ip' => $ip,
                    'browser' => $browser,
                    'agent' => $agent,
                    'platform' => $platform,
                    'owner_partner' => $owner_partner->id,
                ]);

                // Используем идентификатор пользователя от администратора партнера
                $user = $owner_partner->admin->first();
                if ($user) {
                    $this->createQuantityUserRequest($user->id,$owner_partner->id,$newCheckUser->id);
                }
            }
        }
    }



    public function checkGroupUsers($request)
    {
        $usersData = $request->all();

        $checkUsers = [];
        $i = 0;
        foreach ($usersData as $userData)
        {
                $email = EncryptService::coding($userData['email']);

                $user = self::checkInUserList($email);

                if (isset($user))
                {
                    $checkUsers[$i] = $userData;

                    $checkUsers[$i]['chargeback_initiator'] = 1;

                    Quantity_user_request::create([
                        'user_id' => 1,
                        'partner_id' => session()->get('partner_id'),
                        'check_user_id' => $user->id,
                        'type' => QuantityCheckUsersTypeEnum::CHECKED,
                    ]);
                }
                else
                {
                    $checkUsers[$i] = $userData;

                    $checkUsers[$i]['chargeback_initiator'] = 0;
                }
                $i++;
        }

        return $checkUsers;
    }

    public static function checkInUserList($email)
    {
        $checkUser = CheckUser::query()->where('email',$email)->first();

        return $checkUser ? $checkUser : null;
    }

    protected function createQuantityUserRequest($userId, $ownerPartnerId, $checkUserId)
    {
        $currentPartner = PartnerService::getIdCurrentParnter($userId);

        $checkQuantityUser = $this->checkQuantityCheckUser($userId, $currentPartner, $checkUserId);

        if ($checkQuantityUser)
        {
            $checkQuantityUser->quantity += 1;

            $checkQuantityUser->save();
        }
        else
        {
            Quantity_user_request::create([
                'user_id' => $userId,
                'partner_id' => $ownerPartnerId,
                'check_user_id' => $checkUserId,
                'type' => QuantityCheckUsersTypeEnum::DOWNLOAD,
            ]);
        }
    }

    protected function checkQuantityCheckUser($userId, $partnerID, $checkUserId)
    {
        $checkQuantityUser = Quantity_user_request::query()->where('check_user_id',$checkUserId)
                                                            ->where('partner_id',$partnerID)
                                                            ->where('user_id',$userId)
                                                            ->first();
        if ($checkQuantityUser)
            return $checkQuantityUser;
        else
            return null;
    }
}

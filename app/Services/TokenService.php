<?php

namespace App\Services;

use App\Enums\TokenTypeEnum;
use App\Models\Partners;
use App\Models\Token;

class TokenService
{
    public static function createToken($partner_id)
    {
        $partner = Partners::query()->find($partner_id);

        $string = $partner->name.now();

        $token = hash('sha256',$string);

        return $token;
    }

    public static function checkPeriodStatusToken()
    {
        $user = Auth()->user();

        if (session()->has('partner_id'))
        {
            $partner_id = session()->get('partner_id');

            $token = Token::query()->where('partner_id',$partner_id)
                ->where('active',TokenTypeEnum::ACTIVE)->first();

            $token->update(['active',TokenTypeEnum::INACTIVE]);

        }
        $partners = $user->partners;


    }
}

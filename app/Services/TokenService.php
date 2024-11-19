<?php

namespace App\Services;

use App\Enums\TokenTypeEnum;
use App\Models\Partners;
use App\Models\Token;
use Illuminate\Support\Carbon;

class TokenService
{
    public static function createToken($partner_id)
    {
        $partner = Partners::query()->find($partner_id);

        $string = $partner->name.now();

        $token = hash('sha256',$string);

        return $token;
    }

    public static function checkPeriodStatusToken($user)
    {
        $partners = $user->partners;

        foreach ($partners as $partner)
        {
            $tokens = $partner->token;

            foreach ($tokens as $token)
            {
                if ($token->active == TokenTypeEnum::INACTIVE && $token->finish_date >= now())
                {
                    $token->active = TokenTypeEnum::ACTIVE;
                    $token->save();
                }
                elseif($token->active == TokenTypeEnum::ACTIVE && $token->finish_date < now())
                {
                    $token->active = TokenTypeEnum::INACTIVE;
                    $token->save();
                }
            }
        }
    }

    public static function changeTokenFinishDate($tokenId)
    {
        $token = Token::query()->find($tokenId);

        $finishDate = Carbon::parse($token->finish_date);

        if ($finishDate > now())
            return true;
        else
            return false;
    }

    public static function tokenExtendAndActive($token, $period)
    {
        $token->update([
            'active'=> TokenTypeEnum::ACTIVE,
            'finish_date' => Carbon::parse($token->finish_date)->addMonths($period),
        ]);
    }
}

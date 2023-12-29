<?php

namespace App\Services;

use App\Models\Partners;

class TokenService
{
    public static function createToken($partner_id)
    {
        $partner = Partners::query()->find($partner_id);

        $string = $partner->name.now();

        $token = hash('sha256',$string);

        return $token;
    }
}

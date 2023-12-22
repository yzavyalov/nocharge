<?php

namespace App\Services;

class TokenService
{
    public static function createToken($partnerName)
    {
        $string = $partnerName.now();
        dd($string);
    }
}

<?php

namespace App\Services;

class EncryptService
{
    public static function checkStringSHA256($string)
    {
        $pattern = '/^[0-9a-fA-F]{64}$/'; // Паттерн для SHA-256 хэш-суммы

        if (preg_match($pattern, $string)) {
            return true;
        } else {
            return false;
        }
    }

    public static function sha256hash($string)
    {
        $string256Hash = hash('sha256', $string);

        return $string256Hash;
    }


    public static function coding($n)
    {
        if (EncryptService::checkStringSHA256($n))
            return $n;
        else
            return EncryptService::sha256hash($n);
    }
}

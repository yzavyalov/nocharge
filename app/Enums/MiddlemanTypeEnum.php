<?php

namespace App\Enums;

class MiddlemanTypeEnum
{
    const PSP = 1;
    const GATE = 2;
    const AGENT = 3;
    const BANK =4;
    const OTHER = 5;



    public static function toSelectArray(): array
    {
        return [
            self::PSP => 'PSP',
            self::GATE => 'Gate',
            self::AGENT => 'Agent',
            self::BANK => 'BankP',
            self::OTHER => 'Other',
        ];
    }
}

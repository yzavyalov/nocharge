<?php

namespace App\Enums;

enum PartnersTypeEnum
{
    const CASINO = 1;
    const FOREX = 2;
    const DATING = 3;
    const PSP =4;
    const POKER = 5;
    const OTHER = 6;


    public static function toSelectArray(): array
    {
        return [
            self::CASINO => 'Casino',
            self::FOREX => 'Forex',
            self::DATING => 'Dating',
            self::PSP => 'PSP',
            self::POKER => 'Poker',
            self::OTHER => 'Other',
        ];
    }
}

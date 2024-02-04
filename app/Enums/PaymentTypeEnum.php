<?php

namespace App\Enums;

enum PaymentTypeEnum
{
    const TEST_PERIOD = 1;
    const PAID = 2;
    const UNPAID =3;
    const CHECK =4;


    public static function toSelectArray(): array
    {
        return [
            self::TEST_PERIOD => 'Test_period',
            self::PAID => 'Paid',
            self::UNPAID => 'Unpaid',
            self::CHECK => 'Check',
        ];
    }

}

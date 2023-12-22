<?php

namespace App\Enums;

enum EmployeeApplicationStatusEnum
{
    const CREATED = 1;
    const AGREED = 2;
    const CANCELED = 3;


    public static function toSelectArray(): array
    {
        return [
            self::CREATED => 'Created',
            self::AGREED => 'Agreed',
            self::CANCELED => 'Canceled',
        ];
    }
}

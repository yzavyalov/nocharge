<?php

namespace App\Enums;

enum MessageTypeEnum
{
    const NEW = 1;
    const READ = 2;
    const ANSWERED = 3;


    public static function toSelectArray(): array
    {
        return [
            self::NEW => 'New',
            self::READ => 'Read',
            self::ANSWERED => 'Answered',
        ];
    }
}

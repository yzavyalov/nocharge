<?php

namespace App\Services;

use App\Enums\PaymentTypeEnum;
use App\Models\Payment;

class PaymentService
{
    public static function addPayment($partner,$sum)
    {
        $partner->payments()->save(new Payment([
            'sum' => $sum,
            'currency' => 'USDT',
            'status' => PaymentTypeEnum::PAID,
        ]));
    }
}

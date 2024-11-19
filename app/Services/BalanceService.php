<?php

namespace App\Services;

use App\Models\Partners;

class BalanceService
{
    public function plusBalance($partnerId, $sum)
    {
        $partner = Partners::query()->find($partnerId);

        $partner->update([
            'balance' => ($partner->balance ?? 0) + $sum,
        ]);

        return true;
    }

    public function minusBalance($partnerId, $sum)
    {
        $partner = Partners::query()->find($partnerId);

        if ($partner->balance >= $sum)
        {
            $partner->update([
                'balance' => ($partner->balance ?? 0) - $sum,
            ]);

            PaymentService::addPayment($partner,-$sum);

            return true;
        }
        else
            return false;
    }

    public function checkBalance($partner, $payd)
    {
        if ($partner->balance >= $payd)
            return true;
        else
            return false;
    }

}

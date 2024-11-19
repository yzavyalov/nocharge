<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Services\BalanceService;

class BalanceController extends Controller
{
    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }
}

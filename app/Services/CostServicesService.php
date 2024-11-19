<?php

namespace App\Services;

class CostServicesService
{
    public function selectIdTokenPeriodPrice($period)
    {
        switch ($period)
        {
            case 1:
                return 1;
            case 3:
                return 2;
            case 12:
                return 3;
        }
    }
}

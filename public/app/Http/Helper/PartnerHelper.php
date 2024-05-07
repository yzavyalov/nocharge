<?php

namespace App\Http\Helper;

use Illuminate\Support\Facades\Auth;

class PartnerHelper
{
    public static function getPartnerId()
    {
        dd(Auth::user()->partners);
    }
}

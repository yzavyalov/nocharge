<?php

namespace App\Services;

use App\Models\Partners;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PartnerService
{
    public static function checkParnter($partnerId)
    {
        return Partners::query()->find($partnerId);
    }

    public static function getParntersForUserId($userId)
    {
        return Partners::query()->where('user_id',$userId)->get();
    }

    public static function getFirstUsersPartner($userId):int
    {
        return User::find($userId)->partners->first()->id;
    }

    public static function getIdCurrentParnter($userId)
    {
        if (session()->get('partner_id'))
            $currentPartner = session()->get('partner_id');
        else
            $currentPartner = self::getFirstUsersPartner($userId);

        if (!$currentPartner && Auth::user()->hasRole('redaktor'))
            $currentPartner = 1;

        return $currentPartner;
    }


}

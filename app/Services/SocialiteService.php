<?php

namespace App\Services;

use App\Models\User;

class SocialiteService
{
    public static function checkUser($email)
    {
        try {
            return User::where('email', $email)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return null;
        }
    }

}

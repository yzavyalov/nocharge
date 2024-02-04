<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanctumTockenController extends Controller
{
    public function generateToken()
    {
        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;
        dd($token);
    }
}

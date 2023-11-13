<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CheckUser;
use App\Services\EncryptService;
use Illuminate\Http\Request;

class CheckUserController extends Controller
{
    public function uploadUser(Request $request)
    {
        $usersData = $request->all(); // Получаем JSON-данные

        $check = function($n)
        {
            if (EncryptService::checkStringSHA256($n))
                return $n;
            else
                return EncryptService::sha256hash($n);
        };

        foreach ($usersData as $userData) {
            $user = array_map($check,$userData);

            CheckUser::create([
                'email' => $user['email'],
                'ip' => $user['ip'],
                'browser' => $user['browser'],
                'agent' => $user['agent'],
                'platform' => $user['platform'],
            ]);

        }
        return response()->json(['message' => 'Пользователи успешно сохранены'], 200);


    }
}

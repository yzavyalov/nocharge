<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangeRequest;
use App\Models\CheckUser;
use App\Services\EncryptService;
use Illuminate\Http\Request;

class CheckUserController extends Controller
{
    public function uploadUser(UserChangeRequest $request)
    {
        $usersData = $request->all(); // Получаем JSON-данные

        foreach ($usersData as $userData) {
            if($userData['email']) {
                $email = EncryptService::coding($userData['email']);
            }

            CheckUser::create([
                '*.email' => 'required|email',
                '*.ip' => 'ip|nullable',
                '*.browser' => 'string|nullable',
                '*.agent' => 'string|nullable',
                '*.platform' => 'string|nullable',
            ]);
        }
        return response()->json(['message' => 'Пользователи успешно сохранены'], 200);


    }
}

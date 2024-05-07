<?php

namespace App\Http\Controllers;

use App\Mail\SendMailForVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class MailController extends Controller
{
    public function reVerification()
    {
        $usersForSend = User::whereNull('email_verified_at')->get();

        foreach ($usersForSend as $user)
        {
            $url = URL::temporarySignedRoute(
                'verification.verify', // Имя маршрута для подтверждения адреса электронной почты
                now()->addMinutes(60), // Время действия ссылки (в данном случае - 60 минут)
                ['id' => $user->id,  // Параметры маршрута (обычно идентификатор пользователя)
                'hash' => sha1($user->getEmailForVerification()),
                ]
            );

            Mail::to($user->email)->send(new SendMailForVerificationMail($user, $url));
        }
        return redirect()->back();
    }
}

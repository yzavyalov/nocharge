<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Socialite\CheckUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SocialiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

       //сделать проверку юзера и если оно есть то обновлять те данные которые пустые
            $user = User::updateOrCreate([
                'email' => $socialUser->email,
            ], [
                'provider_id' => $socialUser->id,
                'provider' => $provider,
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'provider_token' => $socialUser->token,
            ]);

            Auth::login($user);

        return redirect('/dashboard');
    }
}
